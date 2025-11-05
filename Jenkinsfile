pipeline {
    agent any
    environment {
        // ĐÃ SỬA LỖI: Thay đổi từ URL Git sang tên Docker Image Repo
        IMAGE_REPO = 'dothichuc/phpapp' 
    }
    stages {
        stage('Checkout') {
            steps {
                // Tải mã nguồn từ GitHub
                checkout scm
            }
        }
        stage('Prepare') {
            steps {
                script {
                    // Lấy mã hash commit 7 ký tự
                    COMMIT = sh(script: "git rev-parse --short HEAD", returnStdout: true).trim()
                    
                    // Tạo thẻ (tag) cho image, ví dụ: dothichuc/phpapp:a1b2c3d
                    IMAGE_TAG = "${IMAGE_REPO}:${COMMIT}" 
                    env.IMAGE_TAG = IMAGE_TAG // Đặt biến môi trường để sử dụng ở các bước sau
                }
            }
        }
        stage('Build & Push Image') {
            steps {
                script {
                    // Sử dụng Jenkins Credentials 'dockerhub-password'
                    withCredentials([string(credentialsId: 'dockerhub-password', variable: 'DOCKERHUB_PASSWORD')]) {
                        // Đăng nhập vào Docker Hub
                        sh "docker login -u dothichuc -p ${DOCKERHUB_PASSWORD}"
                        
                        // Build Docker image với thẻ đã tạo
                        sh "docker build -t ${IMAGE_TAG} ."
                        
                        // Đẩy (push) image lên Docker Hub
                        sh "docker push ${IMAGE_TAG}"
                    }
                }
            }
        }
        stage('Deploy to Kubernetes') {
            steps {
                script {
                    // Sử dụng Jenkins Credentials 'k8s-config' (file kubeconfig)
                    withCredentials([file(credentialsId: 'k8s-config', variable: 'KUBECONFIG_FILE')]) {
                        env.KUBECONFIG = KUBECONFIG_FILE // Chỉ định tệp config cho kubectl
                        
                        // Cập nhật image của deployment 'php-app' trong namespace 'dev'
                        // bằng image mới vừa build
                        sh "kubectl set image deployment/php-app php-app=${IMAGE_TAG} -n dev"
                    }
                }
            }
        }
    }
    post {
        // Chạy sau khi pipeline kết thúc (dù thành công hay thất bại)
        always {
            script {
                // Đăng xuất khỏi Docker Hub để dọn dẹp
                sh "docker logout"
                
                // Xóa biến môi trường KUBECONFIG
                env.KUBECONFIG = ""
            }
            echo 'Pipeline finished.'
        }
    }
}
