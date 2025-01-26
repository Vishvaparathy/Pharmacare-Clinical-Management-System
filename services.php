<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacare Clinical- Services</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <section id="services">
        <h2>PROVIDING AN EXCEPTIONAL CARE LIKE NO OTHERS</h2>
             <p>Pharmacare Clinical stands apart from others by its unique ability to offer a quality healthcare service which is efficient and effective. We are a fastest growing hospital in the country and we remain committed to delivering exceptional care and creating a legacy that will improve healthcare service in Sri Lanka. We’ve earned our reputation for excellence by providing more than 25 years of kind, attentive, and respectful healthcare services to our patients.</p>
    </section>
    <main>
        <section class="services-content">
            <!-- Sidebar for Services Menu -->
            <aside class="services-sidebar">
                <ul>
                    <li><a href="#" onclick="showService('patient_rooms')">Comfortable Patient Rooms</a></li>
                    <li><a href="#" onclick="showService('icu')">Fully Equipped Modern ICU</a></li>
                    <li><a href="#" onclick="showService('vaccinations')">Vaccinations</a></li>
                    <li><a href="#" onclick="showService('ctg')">C.T.G</a></li>
                    <li><a href="#" onclick="showService('health_check')">Medical Health Check-up Packages</a></li>
                    <li><a href="#" onclick="showService('ambulance')">24-Hour Ambulance Service</a></li>
                    <li><a href="#" onclick="showService('dental')">Dental and Oral Surgery</a></li>
                    <li><a href="#" onclick="showService('xray')">X-Ray</a></li>
                </ul>
            </aside>

            <!-- Service Details -->
            <div class="service-detail" id="service-detail">
                <h2>Comfortable Patient Rooms</h2>
                <p>Comfortable patient room facilities are provided at Pharmacare Clinical for the convenience of our patients during their sick days.</p>
                <img src="patient_room.jpg" alt="Comfortable Patient Room">
            </div>
        </section>
    </main>

    <script>
        // Content data for each service
        const services = {
            patient_rooms: {
                title: "Comfortable Patient Rooms",
                description: "Comfortable patient room facilities are provided at Pharmacare Clinical for the convenience of our patients during their sick days.",
                image: "patient_room.jpg"
            },
            icu: {
                title: "Fully Equipped Modern ICU",
                description: "A fully equipped modern ICU is available with state of the art equipment round the clock to our patients and monitored by a team of highly trained staff.",
                image: "icu.jpg"
            },
            vaccinations: {
                title: "Vaccinations",
                description: "We offer a variety of vaccinations to protect our patients against various diseases.",
                image: "vaccinations.jpg"
            },
            ctg: {
                title: "C.T.G",
                description: "A state of the art C.T.G. machine powered by modern technology is available at Royal Hospital to give our patients a better service in regard to the problems related to heart and its functions.",
                image: "ctg.jpg"
            },
            health_check: {
                title: "Medical Health Check-up Packages",
                description: "Comprehensive health check-up packages for all age groups.",
                image: "health_check.jpg"
            },
            ambulance: {
                title: "24-Hour Ambulance Service",
                description: "Our 24-hour ambulance service is ready to respond to emergencies.",
                image: "ambulance.jpg"
            },
            dental: {
                title: "Dental and Oral Surgery",
                description: "The dental clinic is available every day except Sundays for the convenience of the patients. Patients can discuss their dental disorders with a dentist.",
                image: "dental.jpg"
            },
            xray: {
                title: "X-Ray",
                description: "X-ray facilities available from morning 8 am – 8 pm or any other time with previously requested or arranged. A consultant radiologist is at your service in investigating your X-rays.",
                image: "xray.jpg"
            }
           
        };

        // Function to update service details
        function showService(serviceKey) {
            const service = services[serviceKey];
            document.getElementById("service-detail").innerHTML = `
                <h2>${service.title}</h2>
                <p>${service.description}</p>
                <img src="${service.image}" alt="${service.title}">
            `;

            // Update active class on sidebar links
            const links = document.querySelectorAll('.services-sidebar ul li');
            links.forEach(link => link.classList.remove('active'));
            event.target.parentElement.classList.add('active');
        }
    </script>
<!-- Footer -->
<footer>
        <p>&copy; 2024 Pharmacare Clinical. All Rights Reserved.</p>
    </footer>
</body>
</html>