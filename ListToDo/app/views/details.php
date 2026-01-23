<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom Styles */
        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .modal.active {
            /* Kept for potential future use, but direct class manipulation used in JS */
            opacity: 1;
            visibility: visible;
        }

        .profile-image {
            background-size: cover;
            background-position: center;
            transition: all 0.3s ease;
        }

        /* Ensure modal content is scrollable if it exceeds viewport height */
        .modal>div {
            max-height: 90vh;
            /* Limit modal height */
            overflow-y: auto;
            /* Enable scrolling for modal content */
        }

        /* Prevent body scroll when modal is open */
        body.overflow-hidden {
            overflow: hidden;
        }
    </style>
</head>

<body>

    <div class="bg-white rounded-lg shadow-xl max-w-lg w-full">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-900">Datos de la tarea</h3>

            </div>

            <form class="space-y-4">
                <div>
                    <label for="message-subject" class="block text-sm font-medium text-gray-700 mb-1 sr-only">Titulo</label> <input type="text" id="message-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" value="<?php echo $resp['titulo']; ?>">
                </div>
                <div>
                    <label for="message-body" class="block text-sm font-medium text-gray-700 mb-1 sr-only">Descripcion</label>
                    <textarea id="message-body" rows="5" class="w-full border-gray-300 rounded-md shadow-sm focus:border-pink-500 focus:ring-pink-500 p-2 border" required><?php echo $resp['descripcion']; ?></textarea>
                </div>
                <div class="pt-2 flex items center justify-center">
                    <a href="?action=cdetails" class="text-center flex-1 bg-pink-600 hover:bg-pink-700 text-white py-2.5 px-4 rounded-md font-semibold shadow hover:shadow-md transition">Editar</a>
                    <a href="?action=index" class="text-center flex-12 text-sm bg-gray-400 hover:bg-gray-500 text-white px-4 py-2.5 rounded-md transition shadow hover:shadow-md">REGRESAR</a>
                </div>
            </form>
        </div>
    </div>






    <script>
        // Dummy Profile Data (Replace with actual data fetching)
        const profiles = {
            profile1: {
                name: "Priya Sharma",
                firstName: "Priya",
                age: 27,
                location: "Delhi",
                height: "5'4\"",
                religion: "Hindu / Brahmin",
                language: "Hindi, English",
                marital: "Never Married",
                createdBy: "Self",
                education: "MBA",
                profession: "Software Engineer",
                income: "₹15-20 Lakhs",
                about: "A fun-loving, independent, and ambitious individual looking for a compatible partner to share life's adventures. Enjoys reading, traveling, exploring new cuisines, and spending quality time with family and friends. Believes in mutual respect and understanding in a relationship.",
                img: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
            },
            profile2: {
                name: "Rahul Verma",
                firstName: "Rahul",
                age: 30,
                location: "Bangalore",
                height: "5'10\"",
                religion: "Hindu / Punjabi",
                language: "Hindi, English, Kannada",
                marital: "Never Married",
                createdBy: "Self",
                education: "B.Tech",
                profession: "Product Manager",
                income: "₹20-25 Lakhs",
                about: "Tech enthusiast with a passion for innovation and problem-solving. Seeking an understanding, supportive, and like-minded partner to share life's journey. Enjoys trekking, coding side-projects, and watching movies.",
                img: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
            },
            profile3: {
                name: "Neha Patel",
                firstName: "Neha",
                age: 26,
                location: "Mumbai",
                height: "5'5\"",
                religion: "Hindu / Patel",
                language: "Hindi, English, Gujarati",
                marital: "Never Married",
                createdBy: "Parents",
                education: "M.Sc (Nutrition)",
                profession: "Nutritionist",
                income: "₹8-10 Lakhs",
                about: "Passionate about health, wellness, and living a balanced life. Looking for someone with similar values, who is family-oriented, down-to-earth, and enjoys a healthy lifestyle. Loves cooking, yoga, and exploring cafes.",
                img: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
            },
            profile4: {
                name: "Amit Singh",
                firstName: "Amit",
                age: 32,
                location: "Pune",
                height: "5'9\"",
                religion: "Sikh / Khatri",
                language: "Hindi, English, Marathi, Punjabi",
                marital: "Never Married",
                createdBy: "Self",
                education: "MBA (Finance)",
                profession: "Finance Professional",
                income: "₹25-30 Lakhs",
                about: "A dedicated professional with a balanced approach to work and life. Enjoys playing cricket, listening to music, and spending quality time with family and friends. Seeking a simple, caring, and understanding partner.",
                img: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=80'
            },
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