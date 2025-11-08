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
                    // Lấy commit hash rút gọn
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
                    script {
                        // Đảm bảo PV được tạo trước
                        sh "kubectl --kubeconfig=$KCFG apply -f K8s/mysql-pv.yaml --validate=false"
                        sh "kubectl --kubeconfig=$KCFG apply -f K8s/mysql.yaml"
                        sh "kubectl --kubeconfig=$KCFG apply -f K8s/service.yaml"

                        // Thay image trong deployment.yaml trước khi apply
                        sh """
                            sed -i 's|image: ${IMAGE_REPO}:placeholder|image: ${IMAGE_TAG}|g' K8s/deployment.yaml
                            kubectl --kubeconfig=$KCFG apply -f K8s/deployment.yaml
                        """

                        // Đảm bảo deployment update image và rollout thành công
                        sh "kubectl --kubeconfig=$KCFG set image deployment/phpapp-deployment phpapp=${IMAGE_TAG} --record"
                        sh "kubectl --kubeconfig=$KCFG rollout status deployment/phpapp-deployment --timeout=120s"
                    }
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

