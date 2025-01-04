<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="breadcrumbarea">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb__content__wraper" data-aos="fade-up">
                        <div class="breadcrumb__title">
                            <h2 class="heading" style="font-size: 56px;">Yuk! Direview AI</h2>
                        </div>
                        <div class="breadcrumb__inner">
                            <ul>
                                <li>Rekam Diri Kamu dan Dapatkan Umpan Balik Real-Time</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="shape__icon__2">
            <img loading="lazy" class="shape__icon__img shape__icon__img__1" src="../img/herobanner/herobanner__1.png" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__2" src="../img/herobanner/herobanner__2.png" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__3" src="../img/herobanner/herobanner__3.png" alt="photo" />
            <img loading="lazy" class="shape__icon__img shape__icon__img__4" src="../img/herobanner/herobanner__5.png" alt="photo" />
        </div>
    </div>

    <div class="blogarea__2 zoom__meetings__details sp_top_100 sp_bottom_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center" style="margin: 50px 0;">
                    <div class="video-container aos-init aos-animate" data-aos="fade-up">
                        <img loading="lazy" src="../img/zoom/details2.png" alt="Placeholder Image" id="placeholderImage" style="max-width: 100%; height: auto;"/>
                        <div class="video-wrapper" style="display: none;">
                            <video id="video" width="640" height="480" autoplay muted hidden></video>
                            <canvas id="output" width="640" height="480"></canvas>
                        </div>
                    </div>
                    <br />
                    <button class="default__button" id="startButton">Mulai</button>
                    <button class="default__button" id="stopButton" style="background-color: red; display: none;">Berhenti</button>
                </div>
            </div>

            <div class="row" id="resultSection" style="display: none; margin-top: 50px;">
                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample1">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne1">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="false" aria-controls="collapseOne1">
                                        Gesture (<span id="gesturePercentage">0</span>%)
                                    </button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <p>Umpan balik mengenai gestur kamu akan ditampilkan di sini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                        Kesesuaian Ekspresi (<span id="expressionPercentage">0</span>%)
                                    </button>
                                </h2>
                                <div id="collapseOne2" class="accordion-collapse collapse" aria-labelledby="headingOne2" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <p>Umpan balik mengenai ekspresi kamu akan ditampilkan di sini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                    <div class="create__course__accordion__wraper">
                        <div class="accordion" id="accordionExample3">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
                                        Vocal (<span id="vocalRangePercentage">0</span>%)
                                    </button>
                                </h2>
                                <div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne3" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <p>Umpan balik mengenai vocal kamu akan ditampilkan di sini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bagian konten lainnya dapat ditambahkan di sini -->
        </div>
    </div>

    <!-- Script Mediapipe dan JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/holistic/holistic.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/drawing_utils/drawing_utils.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const videoElement = document.getElementById('video');
        const canvasElement = document.getElementById('output');
        const canvasCtx = canvasElement.getContext('2d');
        const placeholderImage = document.getElementById('placeholderImage');
        const videoWrapper = document.querySelector('.video-wrapper');
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const resultSection = document.getElementById('resultSection');

        let holistic;
        let camera;
        let isRecording = false;

        startButton.addEventListener('click', () => {
            const userStatus = "{{ auth()->user()->status_member }}";
            let userPoints = {{ auth()->user()->point }}; // Poin user

            if (userStatus === 'pro' || userStatus === 'basic') {
                if (!isRecording) {
                    isRecording = true;
                    startButton.style.display = 'none';
                    stopButton.style.display = 'inline-block';
                    placeholderImage.style.display = 'none';
                    videoWrapper.style.display = 'block';

                    holistic = new Holistic({
                        locateFile: (file) => {
                            return `https://cdn.jsdelivr.net/npm/@mediapipe/holistic/${file}`;
                        }
                    });

                    holistic.setOptions({
                        modelComplexity: 1,
                        smoothLandmarks: true,
                        enableSegmentation: true,
                        smoothSegmentation: true,
                        refineFaceLandmarks: true,
                        minDetectionConfidence: 0.5,
                        minTrackingConfidence: 0.5
                    });

                    holistic.onResults(onResults);

                    camera = new Camera(videoElement, {
                        onFrame: async () => {
                            await holistic.send({ image: videoElement });
                        },
                        width: 640,
                        height: 480
                    });
                    camera.start();
                }
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Akses Ditolak',
                    text: 'Silahkan Berlangganan Untuk Mengakses Fitur Ini',
                    confirmButtonText: 'Beli Paket',
                    cancelButtonText: 'Gunakan Poin',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/#pricing';
                    } else if (result.isDismissed) {
                        if (userPoints >= 100) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Anda dapat menggunakan 100 poin untuk mengakses fitur ini.',
                                confirmButtonText: 'Oke'
                            }).then(() => {
                                // Mengurangi poin di database
                                fetch('/api/reduce-points', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({ points: 100 })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        if (!isRecording) {
                                            isRecording = true;
                                            startButton.style.display = 'none';
                                            stopButton.style.display = 'inline-block';
                                            placeholderImage.style.display = 'none';
                                            videoWrapper.style.display = 'block';

                                            holistic = new Holistic({
                                                locateFile: (file) => {
                                                    return `https://cdn.jsdelivr.net/npm/@mediapipe/holistic/${file}`;
                                                }
                                            });

                                            holistic.setOptions({
                                                modelComplexity: 1,
                                                smoothLandmarks: true,
                                                enableSegmentation: true,
                                                smoothSegmentation: true,
                                                refineFaceLandmarks: true,
                                                minDetectionConfidence: 0.5,
                                                minTrackingConfidence: 0.5
                                            });

                                            holistic.onResults(onResults);

                                            camera = new Camera(videoElement, {
                                                onFrame: async () => {
                                                    await holistic.send({ image: videoElement });
                                                },
                                                width: 640,
                                                height: 480
                                            });
                                            camera.start();
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal',
                                            text: data.message || 'Terjadi kesalahan saat mengurangi poin.',
                                            confirmButtonText: 'Oke'
                                        });
                                    }
                                })
                                .catch(error => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Terjadi kesalahan saat menghubungi server.',
                                        confirmButtonText: 'Oke'
                                    });
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Anda tidak memiliki cukup poin untuk mengakses fitur ini tonton uji tampil orang orang untuk mengumpulkan poin.',
                                confirmButtonText: 'Oke'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/uji-tampil/jadwal-uji-tampil';
                                }
                            });
                        }
                    }
                });
            }
        });

        function saveSession(sessionName, gestureScore, expressionScore, vocalScore, gestureFeedback, expressionFeedback, vocalFeedback) {
            const data = {
                session_name: sessionName,
                gesture_score: gestureScore,
                expression_score: expressionScore,
                vocal_quality_score: vocalScore,
                gesture_feedback: gestureFeedback,
                expression_feedback: expressionFeedback,
                vocal_quality_feedback: vocalFeedback,
                _token: '{{ csrf_token() }}' 
            };

            fetch('/save-session', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                Swal.fire('Sukses!', 'Sesi telah disimpan.', 'success').then(() => {
                    window.location.reload(); // Refresh halaman setelah SweetAlert ditutup
                });
            })
            .catch((error) => {
                console.error('Error:', error);
                Swal.fire('Gagal!', 'Terjadi kesalahan saat menyimpan sesi.', 'error');
            });
        }



        stopButton.addEventListener('click', () => {
            if (isRecording) {
                isRecording = false;
                camera.stop();
                videoWrapper.style.display = 'none';
                placeholderImage.style.display = '';
                startButton.style.display = 'inline-block';
                stopButton.style.display = 'none';

                const gestureScore = Math.floor(Math.random() * 31) + 45;
                const expressionScore = Math.floor(Math.random() * 31) + 45;
                const vocalScore = Math.floor(Math.random() * 31) + 45;

                document.getElementById('gesturePercentage').textContent = gestureScore;
                document.getElementById('expressionPercentage').textContent = expressionScore;
                document.getElementById('vocalRangePercentage').textContent = vocalScore;

                let gestureFeedback = '';
                let expressionFeedback = '';
                let vocalFeedback = '';

                if (gestureScore >= 45 && gestureScore <= 59) {
                    gestureFeedback = 'Gestur tubuh masih terlihat kaku, rilekskan tubuh kamu agar mendukung pesan yang disampaikan.';
                } else if (gestureScore >= 60 && gestureScore <= 75) {
                    gestureFeedback = 'Gesture tubuh cukup baik, namun masih terdapat bagian yang perlu ditingkatkan antara koordinasi gesture dan kata yang disampaikan.';
                }

                if (expressionScore >= 45 && expressionScore <= 59) {
                    expressionFeedback = 'Ekspresi wajah kamu cenderung datar. Cobalah lebih ekspresif agar lebih menghidupkan penampilan kamu.';
                } else if (expressionScore >= 60 && expressionScore <= 75) {
                    expressionFeedback = 'Ekspresi wajah kamu cukup baik. Namun ekspresi yang lebih variatif akan lebih menghidupkan presentasi kamu.';
                }

                if (vocalScore >= 45 && vocalScore <= 59) {
                    vocalFeedback = 'Intonasi suara kamu menoton, cobalah untuk lebih variatif dalam mengatur nada suara kamu.';
                } else if (vocalScore >= 60 && vocalScore <= 75) {
                    vocalFeedback = 'Penggunaan intonasi kamu sudah cukup baik. Menambah eksplorasi dapat membantu presentasi kamu jauh lebih menarik.';
                }

                document.querySelector('#collapseOne1 .accordion-body').textContent = gestureFeedback;
                document.querySelector('#collapseOne2 .accordion-body').textContent = expressionFeedback;
                document.querySelector('#collapseOne3 .accordion-body').textContent = vocalFeedback;

                resultSection.style.display = 'flex';

                // SweetAlert untuk meminta nama sesi
                Swal.fire({
                    title: 'Simpan Sesi',
                    input: 'text',
                    inputLabel: 'Masukkan nama sesi',
                    inputPlaceholder: 'Nama sesi',
                    showCancelButton: true,
                    confirmButtonText: 'Simpan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const sessionName = result.value;
                        // Panggil fungsi untuk menyimpan ke database
                        saveSession(sessionName, gestureScore, expressionScore, vocalScore, gestureFeedback, expressionFeedback, vocalFeedback);
                    }
                });
            }
        });


        



        function onResults(results) {
            canvasCtx.save();
            canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);

            // Membalikkan kanvas secara horizontal
            canvasCtx.translate(canvasElement.width, 0);
            canvasCtx.scale(-1, 1);

            // Menampilkan video pada kanvas
            canvasCtx.drawImage(results.image, 0, 0, canvasElement.width, canvasElement.height);

            // Menggambar landmark pose
            if (results.poseLandmarks) {
                drawConnectors(canvasCtx, results.poseLandmarks, POSE_CONNECTIONS, { color: '#FFFFFF', lineWidth: 2 });
                drawLandmarks(canvasCtx, results.poseLandmarks, { color: '#FFFFFF', lineWidth: 1 });
            }

            // Menggambar landmark wajah
            if (results.faceLandmarks) {
                drawConnectors(canvasCtx, results.faceLandmarks, FACEMESH_TESSELATION, { color: '#00FF00', lineWidth: 1 });
            }

            // Menggambar landmark tangan kiri
            if (results.leftHandLandmarks) {
                drawConnectors(canvasCtx, results.leftHandLandmarks, HAND_CONNECTIONS, { color: '#FF0000', lineWidth: 2 });
                drawLandmarks(canvasCtx, results.leftHandLandmarks, { color: '#FF0000', lineWidth: 1 });
            }

            // Menggambar landmark tangan kanan
            if (results.rightHandLandmarks) {
                drawConnectors(canvasCtx, results.rightHandLandmarks, HAND_CONNECTIONS, { color: '#0000FF', lineWidth: 2 });
                drawLandmarks(canvasCtx, results.rightHandLandmarks, { color: '#0000FF', lineWidth: 1 });
            }

            canvasCtx.restore();
        }
    </script>
</x-layout>
