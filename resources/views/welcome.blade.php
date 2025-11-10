<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unlock Wealth Resort - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>

<body class="font-sans antialiased">

    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo1.png') }}" alt="Unlock Wealth Resort" class="h-16 w-auto">
                    <span class="ml-3 text-2xl font-bold text-gray-800">UNLOCK WEALTH RESORT</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="text-gray-700 hover:text-green-600 font-medium transition">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-green-600 font-medium transition">About</a>
                    <a href="#services" class="text-gray-700 hover:text-green-600 font-medium transition">Services</a>
                    <a href="#trainers" class="text-gray-700 hover:text-green-600 font-medium transition">Trainers</a>
                    <a href="#contact" class="text-gray-700 hover:text-green-600 font-medium transition">Contact</a>
                </div>
                <div class="flex space-x-4">
                    <a href="#"
                        class="px-6 py-2 text-green-600 border-2 border-green-600 rounded-full hover:bg-green-600 hover:text-white transition font-semibold">Login</a>
                    <a href="#"
                        class="px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700 transition font-semibold">Sign
                        Up</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-20 gradient-bg min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Unlock Your <span class="text-green-300">Wealth</span> of Health
                    </h1>
                    <p class="text-xl mb-8 text-gray-100">
                        Transform your body, mind, and spirit at our premium wellness resort. Expert trainers,
                        personalized programs, and luxurious facilities await you.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#services"
                            class="px-8 py-4 bg-white text-purple-600 rounded-full hover:bg-gray-100 transition font-bold text-lg shadow-lg">Explore
                            Services</a>
                        <a href="#contact"
                            class="px-8 py-4 border-2 border-white text-white rounded-full hover:bg-white hover:text-purple-600 transition font-bold text-lg">Book
                            Now</a>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="float-animation">
                        <img src="{{ asset('images/logo1.png') }}" alt="Unlock Wealth Resort Logo"
                            class="w-80 h-auto drop-shadow-2xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">About Our Resort</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Where wellness meets luxury in a journey of
                    transformation</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Expert Training</h3>
                    <p class="text-gray-600">Work with certified professionals who customize programs to your unique
                        goals and fitness level.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Premium Facilities</h3>
                    <p class="text-gray-600">State-of-the-art equipment and luxurious amenities designed for optimal
                        wellness and comfort.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Proven Results</h3>
                    <p class="text-gray-600">Join thousands of satisfied clients who have achieved their health and
                        wellness goals with us.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Comprehensive wellness programs tailored to your
                    needs</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition">
                    <div class="bg-gradient-to-br from-green-400 to-green-600 p-8 h-80 flex flex-col justify-end">
                        <h3 class="text-2xl font-bold text-white mb-3">Yoga & Meditation</h3>
                        <p class="text-white opacity-90">Find inner peace and flexibility</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition">
                    <div class="bg-gradient-to-br from-purple-400 to-purple-600 p-8 h-80 flex flex-col justify-end">
                        <h3 class="text-2xl font-bold text-white mb-3">Personal Training</h3>
                        <p class="text-white opacity-90">One-on-one expert guidance</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition">
                    <div class="bg-gradient-to-br from-blue-400 to-blue-600 p-8 h-80 flex flex-col justify-end">
                        <h3 class="text-2xl font-bold text-white mb-3">Nutrition Planning</h3>
                        <p class="text-white opacity-90">Customized meal plans</p>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition">
                    <div class="bg-gradient-to-br from-pink-400 to-pink-600 p-8 h-80 flex flex-col justify-end">
                        <h3 class="text-2xl font-bold text-white mb-3">Spa & Wellness</h3>
                        <p class="text-white opacity-90">Rejuvenate and relax</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 gradient-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center text-white">
                <div>
                    <div class="text-5xl font-bold mb-2">500+</div>
                    <div class="text-xl opacity-90">Happy Clients</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">50+</div>
                    <div class="text-xl opacity-90">Expert Trainers</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">15+</div>
                    <div class="text-xl opacity-90">Programs</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">10+</div>
                    <div class="text-xl opacity-90">Years Experience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Ready to Transform Your Life?</h2>
            <p class="text-xl text-gray-600 mb-8">Join us today and start your journey to wellness</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#"
                    class="px-10 py-4 bg-green-600 text-white rounded-full hover:bg-green-700 transition font-bold text-lg shadow-lg">Get
                    Started</a>
                <a href="#"
                    class="px-10 py-4 border-2 border-green-600 text-green-600 rounded-full hover:bg-green-600 hover:text-white transition font-bold text-lg">Contact
                    Us</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <img src="{{ asset('images/logo1.png') }}" alt="Logo" class="h-16 mb-4">
                    <p class="text-gray-400">Transform your life at Unlock Wealth Resort</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#about" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition">Services</a></li>
                        <li><a href="#trainers" class="text-gray-400 hover:text-white transition">Trainers</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Yoga</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Personal Training</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Nutrition</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Spa</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>123 Wellness Avenue</li>
                        <li>Health City, HC 12345</li>
                        <li>Phone: (555) 123-4567</li>
                        <li>Email: info@unlockwealth.com</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 Unlock Wealth Resort. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>

</html>
