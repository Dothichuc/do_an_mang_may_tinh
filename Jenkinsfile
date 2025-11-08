pipeline {
    agent any

    environment {
        IMAGE_REPO = "dothichuc/phpapp"
    }

    stages {

        stage('Checkout Source Code') {
            steps {
                checkout scm
                echo "Code pulled from GitHub"
            }
        }

        stage('Prepare Image Tag') {
            steps {
                script {
                    def COMMIT = sh(script: "git rev-parse --short HEAD", returnStdout: true).trim()
                    env.IMAGE_TAG = "${IMAGE_REPO}:${COMMIT}"
                    echo "Image to build: ${env.IMAGE_TAG}"
                }
            }
        }

        stage('Build Docker Image') {
            steps {
                sh "docker build -t ${env.IMAGE_TAG} ."
            }
        }

        stage('Push Image to Docker Hub') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerHub', usernameVariable: 'USER', passwordVariable: 'PASS')]) {
                    sh """
                        echo "$PASS" | docker login -u "$USER" --password-stdin
                        docker push ${env.IMAGE_TAG}
                    """
                }
            }
        }

        stage('Deploy to Kubernetes') {
            steps {
                withCredentials([file(credentialsId: 'kubeconfig-k8s', variable: 'KCFG')]) {
                    sh """
                        kubectl --kubeconfig=$KCFG get pods

                        kubectl apply -f k8s/mysql-pv.yaml
                        kubectl apply -f k8s/mysql.yaml
                        kubectl apply -f k8s/service.yaml
                        kubectl apply -f k8s/deployment.yaml

                        kubectl set image deployment/phpapp-deployment phpapp=${env.IMAGE_TAG} --record
                        kubectl rollout status deployment/phpapp-deployment --timeout=120s
                    """
                }
            }
        }
    }

    post {
        success {
            echo "Pipeline succeeded"
        }
        failure {
            echo "Pipeline failed"
        }
    }
}
