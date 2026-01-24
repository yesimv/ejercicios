<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To DO List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom Styles */
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .modal.active { /* Kept for potential future use, but direct class manipulation used in JS */
            opacity: 1;
            visibility: visible;
        }
        .profile-image {
            background-size: cover;
            background-position: center;
            transition: all 0.3s ease;
        }
        /* Ensure modal content is scrollable if it exceeds viewport height */
        .modal > div {
             max-height: 90vh; /* Limit modal height */
             overflow-y: auto; /* Enable scrolling for modal content */
        }
        /* Prevent body scroll when modal is open */
        body.overflow-hidden {
            overflow: hidden;
        }
    </style>
</head>
<body>
 
 <h2 class="text-3xl font-bold text-gray-900 m-10"><?php echo $_SESSION['nombre']  ?></h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 m-10">
       
        <?php foreach  ($mostrarLista1 as $index => $elemento){
        if($elemento['estaFinalizada']){
            $isEnd = '<button  class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">FINALIZADA</button>
                         ';
        }else{
            $isEnd = '<button  class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">PENDIENTE</button>
                         ';
        }
        ?>
        
            <div class="profile-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 flex flex-col">
              
                <div class="p-4 flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-1">
                             <div>
                                <h3 class="text-lg font-semibold text-gray-800"><?php 
                                    echo $elemento['titulo'];
                                     ?></h3>
                                 </br>
                                     <?php 
                                     echo $isEnd;
                                 
                                  ?>
                             </div>
                             
                        </div>
                        
                    </div>
                    <div class="mt-4 flex gap-2">
                        <?php 
                        if($_SESSION['isAdmin']== true){

                           echo '
                           <form method="post" action="?action=delete&id=';echo $elemento["id"];
                           echo '">
                           <button  type="submit" class="text-center flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md">Eliminar</button>
                            </form>';
                        } ?>
                         
                         <a href="?action=details&id=<?php echo $elemento['id'] ?>" class="text-center flex-1 text-sm border border-pink-600 text-pink-600 hover:bg-pink-50 px-3 py-2 rounded-md transition"> Ver</a>
                         
                    </div>
                </div>
            </div>
           <?php } ?>

    </div>

    <br>
    <?php 
    if($_SESSION['isAdmin']){
        echo '<a href="?action=nuevo" class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md m-10">NUEVO</a>
    ';
    }
    ?>

    <a href="?action=cerrar" class="flex-1 text-sm bg-pink-600 hover:bg-pink-700 text-white px-3 py-2 rounded-md transition shadow hover:shadow-md m-10">CERRAR SESION</a>
    
                        




    <div id="login-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4 z-50 opacity-0 invisible transform scale-95 transition-all duration-300 ease-out" onclick="event.target === this && closeModal('login-modal')">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full"> <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Login</h3>
                    <button onclick="closeModal('login-modal')" class="text-gray-400 hover:text-gray-600 transition">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
                <form class="space-y-6">
                    <div>
                        <label for="login-email" class="block text-sm font-medium text-gray-700 mb-1">Email or Profile ID</label>
                        <input type="text" id="login-email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="your@email.com">
                    </div>
                    <div>
                        <label for="login-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="login-password" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="********">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-pink-600 hover:text-pink-500">Forgot password?</a>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2.5 px-4 rounded-md font-semibold shadow hover:shadow-md transition">Login</button>
                    </div>
                </form>
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <a href="#" class="w-full inline-flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                             <svg class="w-5 h-5 mr-2 -ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 0a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm4.144 6.21a.5.5 0 0 1 .707.707l-7.071 7.071a.5.5 0 1 1-.707-.707l7.071-7.071zm-1.414-.707a.5.5 0 0 1 0 .707L6.363 12.576a.5.5 0 1 1-.707-.707L12.73 5.503a.5.5 0 0 1 .707 0z" clip-rule="evenodd" /><path d="M10 3a7 7 0 1 0 0 14 7 7 0 0 0 0-14zm-4.828 2.757a.5.5 0 0 1 .707 0L10 9.293l4.121-4.121a.5.5 0 1 1 .707.707L10.707 10l4.121 4.121a.5.5 0 1 1-.707.707L10 10.707l-4.121 4.121a.5.5 0 0 1-.707-.707L9.293 10 5.172 5.879a.5.5 0 0 1 0-.707z"/></svg>
                             Google
                        </a>
                        <a href="#" class="w-full inline-flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition">
                             <svg class="w-5 h-5 mr-2 -ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" /></svg>
                             Facebook
                        </a>
                    </div>
                </div>
                <div class="mt-6 text-center text-sm">
                    <p class="text-gray-600">
                        Don't have an account?
                        <button onclick="switchModal('login-modal', 'register-modal')" class="text-pink-600 hover:text-pink-500 font-medium">Register</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="register-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4 z-50 opacity-0 invisible transform scale-95 transition-all duration-300 ease-out" onclick="event.target === this && closeModal('register-modal')">
         <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Create Your Profile</h3>
                    <button onclick="closeModal('register-modal')" class="text-gray-400 hover:text-gray-600 transition">
                         <span class="sr-only">Close</span>
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
                <form class="space-y-5"> <div>
                         <label class="block text-sm font-medium text-gray-700 mb-1">Profile created for</label>
                         <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
                             <option>Myself</option>
                             <option>Son</option>
                             <option>Daughter</option>
                             <option>Brother</option>
                             <option>Sister</option>
                             <option>Friend</option>
                             <option>Relative</option>
                         </select>
                     </div>
                    <div>
                        <label for="register-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="register-name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="Enter your full name">
                    </div>
                     <div>
                         <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                         <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border">
                             <option>Male</option>
                             <option>Female</option>
                         </select>
                     </div>
                    <div>
                        <label for="register-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="register-email" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="Enter your email">
                    </div>
                    <div>
                        <label for="register-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="register-password" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="Create a password">
                    </div>
                    <div>
                        <label for="register-mobile" class="block text-sm font-medium text-gray-700 mb-1">Mobile Number</label>
                        <input type="tel" id="register-mobile" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="Enter your mobile number">
                    </div>
                    <div class="flex items-start"> <input id="terms" name="terms" type="checkbox" class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded mt-0.5">
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-pink-600 hover:text-pink-500 underline">Terms & Conditions</a> and <a href="#" class="text-pink-600 hover:text-pink-500 underline">Privacy Policy</a>.
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2.5 px-4 rounded-md font-semibold shadow hover:shadow-md transition">Register Free</button>
                    </div>
                </form>
                <div class="mt-6 text-center text-sm">
                    <p class="text-gray-600">
                        Already have an account?
                        <button onclick="switchModal('register-modal', 'login-modal')" class="text-pink-600 hover:text-pink-500 font-medium">Login</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="message-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4 z-50 opacity-0 invisible transform scale-95 transition-all duration-300 ease-out" onclick="event.target === this && closeModal('message-modal')">
        <div class="bg-white rounded-lg shadow-xl max-w-lg w-full"> <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Detalles</h3>
                    <button onclick="closeModal('message-modal')" class="text-gray-400 hover:text-gray-600 transition">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
                 
                <form class="space-y-4">
                    <div>
                        <label for="message-subject" class="block text-sm font-medium text-gray-700 mb-1 sr-only">Titulo</label> <input type="text" id="message-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="<?php $mostrarPendiente ?>">
                    </div>
                    <div>
                        <label for="message-body" class="block text-sm font-medium text-gray-700 mb-1 sr-only">Descripcion</label>
                        <textarea id="message-body" rows="5" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" placeholder="Write your message here..." required></textarea>
                    </div>
                    <div class="pt-2"> <button onclick="$edi" type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white py-2.5 px-4 rounded-md font-semibold shadow hover:shadow-md transition">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <div id="shortlist-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4 z-50 opacity-0 invisible transform scale-95 transition-all duration-300 ease-out" onclick="event.target === this && closeModal('shortlist-modal')">
        <div class="bg-white rounded-lg shadow-xl max-w-sm w-full">
            <div class="p-8 text-center"> <div class="text-green-500 mb-5"> <i class="fas fa-check-circle fa-4x"></i> </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Profile Shortlisted!</h3>
                <p class="text-gray-600 mb-6">This profile has been successfully added to your shortlist. You can view your shortlist from your dashboard.</p>
                <button onclick="closeModal('shortlist-modal')" class="bg-pink-600 hover:bg-pink-700 text-white py-2 px-6 rounded-md font-semibold shadow hover:shadow-md transition">Okay</button>
            </div>
        </div>
    </div>

    <div id="profile-detail-modal" class="modal fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center p-4 z-50 opacity-0 invisible transform scale-95 transition-all duration-300" onclick="event.target === this && closeModal('profile-detail-modal')">
        <div class="bg-white rounded-lg shadow-xl max-w-3xl w-full"> <div class="p-6 relative">
                <button onclick="closeModal('profile-detail-modal')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition z-10">
                    <span class="sr-only">Close</span>
                    <i class="fas fa-times fa-lg"></i>
                </button>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-1">
                        <img id="profile-modal-img" src="https://via.placeholder.com/400x500/cccccc/969696?text=Loading..." alt="Profile Photo" class="rounded-lg w-full h-auto object-cover shadow-md mb-4">
                        <div class="flex flex-col space-y-2">
                             <button onclick="openModal('message-modal'); closeModal('profile-detail-modal');" class="w-full text-sm bg-pink-600 hover:bg-pink-700 text-white px-4 py-2.5 rounded-md font-semibold transition shadow hover:shadow-md"><i class="fas fa-envelope mr-1.5"></i> Send Message</button>
                             <button onclick="openModal('shortlist-modal'); /* Add actual shortlist logic here */" class="w-full text-sm border border-pink-600 text-pink-600 hover:bg-pink-50 px-4 py-2.5 rounded-md font-semibold transition"><i class="far fa-heart mr-1.5"></i> Shortlist Profile</button>
                             </div>
                    </div>

                    <div class="md:col-span-2 space-y-6">
                         <div>
                            <h3 id="profile-modal-name" class="text-3xl font-bold text-gray-900 mb-1">Profile Name</h3>
                             <p id="profile-modal-basic-header" class="text-gray-600">Loading details...</p>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-pink-700 mb-2 border-b pb-1">About <span id="profile-modal-firstname"></span></h4>
                            <p id="profile-modal-about" class="text-gray-700 text-sm leading-relaxed">Loading details...</p>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-pink-700 mb-2 border-b pb-1">Basic Information</h4>
                            <dl class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm text-gray-700">
                                <dt class="font-medium text-gray-500">Age / Height:</dt>
                                <dd id="profile-modal-age-height">-- / --</dd>
                                <dt class="font-medium text-gray-500">Religion / Community:</dt>
                                <dd id="profile-modal-religion">--</dd>
                                <dt class="font-medium text-gray-500">Location:</dt>
                                <dd id="profile-modal-location">--</dd>
                                <dt class="font-medium text-gray-500">Mother Tongue:</dt>
                                <dd id="profile-modal-language">--</dd>
                                <dt class="font-medium text-gray-500">Marital Status:</dt>
                                <dd id="profile-modal-marital">--</dd>
                                <dt class="font-medium text-gray-500">Profile Created By:</dt>
                                <dd id="profile-modal-createdby">--</dd>
                            </dl>
                        </div>

                         <div>
                            <h4 class="text-lg font-semibold text-pink-700 mb-2 border-b pb-1">Education & Career</h4>
                            <dl class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm text-gray-700">
                                <dt class="font-medium text-gray-500">Highest Education:</dt>
                                <dd id="profile-modal-education">--</dd>
                                <dt class="font-medium text-gray-500">Profession:</dt>
                                <dd id="profile-modal-profession">--</dd>
                                 <dt class="font-medium text-gray-500">Annual Income:</dt>
                                <dd id="profile-modal-income">--</dd> </dl>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-pink-700 mb-2 border-b pb-1">Partner Preferences</h4>
                            <p class="text-gray-700 text-sm italic">Looking for someone who is [Add preferences here...]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Dummy Profile Data (Replace with actual data fetching)
        const profiles = {
            profile1: { name: "Priya Sharma", firstName: "Priya", age: 27, location: "Delhi", height: "5'4\"", religion: "Hindu / Brahmin", language: "Hindi, English", marital: "Never Married", createdBy: "Self", education: "MBA", profession: "Software Engineer", income: "₹15-20 Lakhs", about: "A fun-loving, independent, and ambitious individual looking for a compatible partner to share life's adventures. Enjoys reading, traveling, exploring new cuisines, and spending quality time with family and friends. Believes in mutual respect and understanding in a relationship.", img: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' },
            profile2: { name: "Rahul Verma", firstName: "Rahul", age: 30, location: "Bangalore", height: "5'10\"", religion: "Hindu / Punjabi", language: "Hindi, English, Kannada", marital: "Never Married", createdBy: "Self", education: "B.Tech", profession: "Product Manager", income: "₹20-25 Lakhs", about: "Tech enthusiast with a passion for innovation and problem-solving. Seeking an understanding, supportive, and like-minded partner to share life's journey. Enjoys trekking, coding side-projects, and watching movies.", img: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' },
            profile3: { name: "Neha Patel", firstName: "Neha", age: 26, location: "Mumbai", height: "5'5\"", religion: "Hindu / Patel", language: "Hindi, English, Gujarati", marital: "Never Married", createdBy: "Parents", education: "M.Sc (Nutrition)", profession: "Nutritionist", income: "₹8-10 Lakhs", about: "Passionate about health, wellness, and living a balanced life. Looking for someone with similar values, who is family-oriented, down-to-earth, and enjoys a healthy lifestyle. Loves cooking, yoga, and exploring cafes.", img: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' },
            profile4: { name: "Amit Singh", firstName: "Amit", age: 32, location: "Pune", height: "5'9\"", religion: "Sikh / Khatri", language: "Hindi, English, Marathi, Punjabi", marital: "Never Married", createdBy: "Self", education: "MBA (Finance)", profession: "Finance Professional", income: "₹25-30 Lakhs", about: "A dedicated professional with a balanced approach to work and life. Enjoys playing cricket, listening to music, and spending quality time with family and friends. Seeking a simple, caring, and understanding partner.", img: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80' },
        };

        // Function to open a modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                // Remove initial hidden/scaled-down states
                // Use requestAnimationFrame to ensure the initial state is rendered before removing classes for transition
                requestAnimationFrame(() => {
                    modal.classList.remove('invisible', 'opacity-0', 'scale-95');
                    // Add final visible state (scale-100 is the default when scale-95 is removed)
                    modal.classList.add('visible', 'opacity-100');
                });
                document.body.classList.add('overflow-hidden'); // Prevent background scroll
            }
            // Specific logic for message modal if needed
            if (modalId === 'message-modal') {
                // Update recipient details if necessary based on context
            }
        }

        // Function to close a modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                // Start the transition by removing visible state and adding scaled-down state
                modal.classList.remove('visible', 'opacity-100');
                modal.classList.add('opacity-0', 'scale-95'); // Add scale-95 back

                // Use setTimeout to add 'invisible' after the transition completes
                setTimeout(() => {
                    modal.classList.add('invisible');

                    // Check if any other modals are open *after* setting invisible
                    const anyModalOpen = document.querySelector('.modal.visible'); // Check only for 'visible'
                    if (!anyModalOpen) {
                       document.body.classList.remove('overflow-hidden'); // Restore background scroll
                    }
                }, 300); // Match transition duration (300ms)
            }
        }

        // --- Keep other JavaScript functions (switchModal, showProfile, mobile menu, etc.) as they were ---
        // Function to switch between modals (e.g., Login <-> Register)
        function switchModal(fromModalId, toModalId) {
            closeModal(fromModalId);
            // Add a small delay to allow the close transition to start/finish
            setTimeout(() => {
                openModal(toModalId);
            }, 150); // Adjust delay (less than transition duration)
        }

        // Function to show profile details in the modal
        function showProfile(profileId) {
            const profileData = profiles[profileId];
            if (!profileData) {
                console.error("Profile data not found for ID:", profileId);
                return;
            }

            // Populate Profile Detail Modal
            document.getElementById('profile-modal-name').textContent = profileData.name;
            document.getElementById('profile-modal-basic-header').textContent = `${profileData.age} yrs, ${profileData.height}, ${profileData.religion}, ${profileData.location}`;
            document.getElementById('profile-modal-firstname').textContent = profileData.firstName;
            document.getElementById('profile-modal-img').src = profileData.img;
            document.getElementById('profile-modal-img').alt = `Photo of ${profileData.name}`;
            document.getElementById('profile-modal-about').textContent = profileData.about;
            document.getElementById('profile-modal-age-height').textContent = `${profileData.age} yrs / ${profileData.height}`;
            document.getElementById('profile-modal-religion').textContent = profileData.religion;
            document.getElementById('profile-modal-location').textContent = profileData.location;
            document.getElementById('profile-modal-language').textContent = profileData.language;
            document.getElementById('profile-modal-marital').textContent = profileData.marital;
            document.getElementById('profile-modal-createdby').textContent = profileData.createdBy;
            document.getElementById('profile-modal-education').textContent = profileData.education;
            document.getElementById('profile-modal-profession').textContent = profileData.profession;
            document.getElementById('profile-modal-income').textContent = profileData.income || '--'; // Handle optional income

             // Update Message Modal Recipient Info Dynamically (Example)
             // You'd likely do this when the "Send Message" button *inside* the profile modal is clicked,
             // but this shows how to access the elements.
             document.getElementById('message-recipient-img').src = profileData.img;
             document.getElementById('message-recipient-name').textContent = profileData.name;


            openModal('profile-detail-modal');
        }

        // Mobile Menu Toggle Logic
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const body = document.body;

         function closeMobileMenu() {
             mobileMenuButton.setAttribute('aria-expanded', 'false');
             mobileMenu.classList.add('hidden');
             mobileMenuButton.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />'; // Menu icon
             // Only remove body overflow if no modal is open
             const anyModalOpen = document.querySelector('.modal.visible.opacity-100');
             if (!anyModalOpen) {
                 body.classList.remove('overflow-hidden');
             }
         }

        mobileMenuButton.addEventListener('click', () => {
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
            if (!isExpanded) {
                 mobileMenuButton.setAttribute('aria-expanded', 'true');
                 mobileMenu.classList.remove('hidden');
                 mobileMenuButton.querySelector('svg').innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />'; // Close icon
                 body.classList.add('overflow-hidden'); // Prevent scroll when menu open
            } else {
                 closeMobileMenu();
            }
        });

        // Optional: Close modal on Escape key press
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                 const openModals = document.querySelectorAll('.modal.visible.opacity-100');
                 if (openModals.length > 0) {
                     // Close the topmost modal
                     closeModal(openModals[openModals.length - 1].id);
                 } else if (mobileMenuButton.getAttribute('aria-expanded') === 'true') {
                     // Close mobile menu if open and no modals are open
                     closeMobileMenu();
                 }
            }
        });

    </script>
</body>
</html>