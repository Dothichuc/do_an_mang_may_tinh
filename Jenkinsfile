pipeline {
  agent any
  environment {
    IMAGE_REPO = 'https://github.com/Dothichuc/do_an_mang_may_tinh.git' 
  }
  stages {
    stage('Checkout') {
      steps {
        checkout scm
      }
    }
    stage('Prepare') {
      steps {
        script {
          COMMIT = sh(script: "git rev-parse --short HEAD", returnStdout: true).trim()
          IMAGE_TAG = "${IMAGE_REPO}:${COMMIT}"
          env.IMAGE_TAG = IMAGE_TAG
        }
      }
    }
    stage('Build & Push Image') {
      steps {
        withCredentials([usernamePassword(credentialsId: 'dockerHub', usernameVariable: 'DOCKER_USER', passwordVariable: 'DOCKER_PASS')]) {
          sh '''
            echo $DOCKER_PASS | docker login -u $DOCKER_USER --password-stdin
            docker build -t ${IMAGE_TAG} .
            docker push ${IMAGE_TAG}
          '''
        }
      }
    }
    stage('Deploy to Kubernetes') {
      steps {
        withCredentials([file(credentialsId: 'kubeconfig', variable: 'KUBECONFIG_FILE')]) {
          sh '''
            export KUBECONFIG=${KUBECONFIG_FILE}
            # Ensure mysql exists (idempotent)
            kubectl apply -f k8s/mysql.yaml
            kubectl apply -f k8s/deployment.yaml
            kubectl apply -f k8s/service.yaml
            # Update image on deployment
            kubectl set image deployment/phpapp-deployment phpapp=${IMAGE_TAG} --record
            kubectl rollout status deployment/phpapp-deployment --timeout=120s
          '''
        }
      }
    }
  }
  post {
    always { echo "Pipeline finished." }
    failure { echo "Pipeline failed." }
  }
}

