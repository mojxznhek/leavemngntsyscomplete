<x-layout-component>
    @if (session('message'))
        <div class="bg-blue-700 py-2 px-4 rounded-md text-center fixed bottom-4 right-4 flex gap-4">
            <p> <x-input-info :messages="session('message')" class="mt-2" /> </p>
            <span class="cursor-pointer font-bold" onclick="return this.parentNode.remove()"><sup
                    class="text-white">X</sup></span>
        </div>
    @endif

    <!-- Hero section -->
    <section class="bg-[#4A3BFF] text-white py-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="font-bold text-5xl leading-tight mb-6">Discover the world's best Leave Management System
                    </h1>
                    <p class="text-xl mb-8">Managing employee leave has never been easier! Our Leave Management System
                        is
                        a user-friendly and efficient solution designed to simplify leave requests, approvals, and
                        tracking. Whether you're an Administrator, Manager, Supervisor, or Employee, our system ensures
                        seamless leave management with transparency and accuracy.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://th.bing.com/th/id/OIP.L0-Za-TBVXpanqnAEGJx1gHaEV?rs=1&pid=ImgDetMain"
                        alt="Coffee beans" class="w-full rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>


    <!-- Featured section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://takweenit.net/portals/0/assets/images/banners/Event%20Management%20System.png"
                        alt="Coffee" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Employee Leave Requests</h3>
                        <p class="text-gray-700 text-base">
                            Easily apply for leave online.
                        </p>

                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://createwithnotion.com/wp-content/uploads/2023/11/Notion-Use-Cases.png"
                        alt="Coffee" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Supervisor Review & Manager Approval </h3>
                        <p class="text-gray-700 text-base">
                            Streamlined approval process.
                        </p>

                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://miro.medium.com/v2/resize:fit:1200/1*K4vzpuPwJUpOmxFfU59dUg.jpeg" alt="Coffee"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2"> Leave Balance Tracking</h3>
                        <p class="text-gray-700 text-base">
                            Keep track of available leave credits.
                        </p>

                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://uknowva.com/images/hrsoftwaresolution.jpg" alt="Coffee"
                        class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2"> Role-Based Access</h3>
                        <p class="text-gray-700 text-base">
                            Ensuring the right permissions for each user.
                        </p>

                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://d1aettbyeyfilo.cloudfront.net/GenesisDigital/26481012_16462414481pJEngage_With_Your_Audience.png"
                        alt="Coffee" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2"> Automated Notifications</h3>
                        <p class="text-gray-700 text-base">
                            Get notified about leave approvals and rejections.
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layout-component>
