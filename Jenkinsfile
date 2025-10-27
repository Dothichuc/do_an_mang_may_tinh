pipeline {
    agent any
    environment {
        KUBECONFIG_FILE = credentials('kubeconfig')
        DOCKER_IMAGE = "mydockerhub/phpapp:${GIT_COMMIT}"
    }
    stages {
        stage('Clone code') {
            steps {
                git url: 'https://github.com/Dothichuc/do_an_mang_may_tinh.git', branch: 'main'
            }
        }
        stage('Build Docker Image') {
            steps {
                sh """
                docker build -t $DOCKER_IMAGE .
                docker push $DOCKER_IMAGE
                """
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                withCredentials([file(credentialsId: 'kubeconfig', variable: 'KUBECONFIG')]) {
                    sh 'kubectl apply -f k8s/mysql.yaml'
                    sh 'kubectl apply -f k8s/deployment.yaml'
                    sh 'kubectl apply -f k8s/service.yaml'
                }
            }
        }
    }
}
