pipeline {
    agent any

    environment {
        IMAGE_REPO = "dothichuc/phpapp"
    }

    stages {

        /*-----------------------------------------------------
         * 1. CHECKOUT CODE TỪ GITHUB
        -----------------------------------------------------*/
        stage('Checkout Source Code') {
            steps {
                checkout scm
                echo "Code pulled from GitHub"
            }
        }

        /*-----------------------------------------------------
         * 2. TẠO TAG IMAGE DỰA TRÊN GIT COMMIT
        -----------------------------------------------------*/
        stage('Generate Image Tag') {
            steps {
                script {
                    def COMMIT = sh(script: "git rev-parse --short HEAD", returnStdout: true).trim()
                    env.IMAGE_TAG = "${IMAGE_REPO}:${COMMIT}"
                    echo "Image tag: ${env.IMAGE_TAG}"
                }
            }
        }

        /*-----------------------------------------------------
         * 3. BUILD DOCKER IMAGE
        -----------------------------------------------------*/
        stage('Build Docker Image') {
            steps {
                sh "docker build -t ${env.IMAGE_TAG} ."
            }
        }

        /*-----------------------------------------------------
         * 4. PUSH IMAGE LÊN DOCKER HUB
        -----------------------------------------------------*/
        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'dockerHub', usernameVariable: 'USER', passwordVariable: 'PASS')]) {
                    sh """
                        echo "$PASS" | docker login -u "$USER" --password-stdin
                        docker push ${env.IMAGE_TAG}
                    """
                }
            }
        }

        /*-----------------------------------------------------
         * 5. DEPLOY ỨNG DỤNG VÀO MÔI TRƯỜNG TEST
        -----------------------------------------------------*/
        stage('Deploy to TEST') {
            steps {
                withCredentials([file(credentialsId: 'kubeconfig-k8s', variable: 'KCFG')]) {
                    sh """
                        # Deploy MySQL
                        kubectl --kubeconfig=$KCFG apply -f K8s/mysql/mysql-pv.yaml
                        kubectl --kubeconfig=$KCFG apply -f K8s/mysql/mysql-pvc.yaml
                        kubectl --kubeconfig=$KCFG apply -f K8s/mysql/mysql-deploy.yaml

                        # Deploy webapp TEST
                        kubectl --kubeconfig=$KCFG apply -f K8s/test/deployment-test.yaml
                        kubectl --kubeconfig=$KCFG apply -f K8s/test/service-test.yaml

                        # Update image mới
                        kubectl --kubeconfig=$KCFG set image deployment/phpapp-deployment phpapp=${IMAGE_TAG} -n test
                        kubectl --kubeconfig=$KCFG rollout status deployment/phpapp-deployment -n test --timeout=150s
                    """
                }
            }
        }

        /*-----------------------------------------------------
         * 6. HEALTH CHECK / TEST TỰ ĐỘNG
        -----------------------------------------------------*/
        stage('Automated Testing') {
            steps {
                script {
                    // Thay IP LoadBalancer TEST của bạn
                    def url = "http://10.79.175.240/webapp/login/dangnhap.php"
                    def status = sh(script: "curl -f ${url} > /dev/null 2>&1 || true", returnStatus: true)

                    if (status != 0) {
                        error("TEST FAILED! Ứng dụng không hoạt động ở môi trường TEST. Pipeline dừng.")
                    }
                    echo "TEST PASSED! Ứng dụng hoạt động tốt trên TEST."
                }
            }
        }

        /*-----------------------------------------------------
         * 7. DEPLOY LÊN MÔI TRƯỜNG PROD
        -----------------------------------------------------*/
        stage('Deploy to PROD') {
            steps {
                withCredentials([file(credentialsId: 'kubeconfig-k8s', variable: 'KCFG')]) {
                    sh """
                        kubectl --kubeconfig=$KCFG apply -f K8s/prod/deployment-prod.yaml
                        kubectl --kubeconfig=$KCFG apply -f K8s/prod/service-prod.yaml

                        # Update image
                        kubectl --kubeconfig=$KCFG set image deployment/phpapp-deployment phpapp=${IMAGE_TAG} -n prod
                        kubectl --kubeconfig=$KCFG rollout status deployment/phpapp-deployment -n prod --timeout=150s
                    """
                }
            }
        }

    }

    post {
        success {
            echo "CI/CD pipeline completed successfully!"
        }
        failure {
            echo "CI/CD pipeline FAILED!"
        }
    }
}
