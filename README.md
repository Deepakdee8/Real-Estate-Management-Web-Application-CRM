# Real Estate Management Web Application - CRM

## About the project

Real Estate CRM is a sophisticated web application tailored for real estate management. It serves as a centralized platform for admins to oversee properties, clients, and executives. Admins have the capability to add new properties and details, such as location, size, amenities, documents, photos, and pricing. Additionally, they can manage a roster of executives, assigning them to specific properties and scheduling property visits for clients. Executives are notified about their schedules within the dashboard and through email, and property details can be sent to clients through WhatsApp from the admin dashboard.

## Key Features
- <b>Interactive Dashboard</b>: Offers a centralized dashboard for admins, executives, and clients, providing an overview of scheduled visits and client interactions.
- <b>Property Management</b>: Allows admins to add, edit, and manage properties, capturing details such as location, size, amenities, and pricing.
- <b>Client Management</b>: Enables admins to maintain a database of clients, facilitating efficient communication and interaction.
- <b>Executive Management</b>: Provides functionality to manage executives, assigning them to specific properties and scheduling property visits.
- <b>Scheduling and Reminders</b>: Allows admins to schedule property visits for clients, with automatic reminders sent to both admins and executives.
- <b>Communication Tools</b>: Facilitates communication between admins, executives, and clients, ensuring seamless coordination and efficient management of property visits.
- <b>Data Storage and Analysis</b>: Stores all property and client details securely in the database, enabling admins to track interactions and analyze data for strategic decision-making.

## Installation

- Clone the repository 
git clone https://github.com/yourusername/real-estate-management.git
cd real-estate-management
- Install dependencies
[composer install
npm install]
- Copy .env.example to .env
[cp .env.example .env]
- Configure your database settings in the .env file
- Run migrations and seeder 
[php artisan migrate --seed]
- Start the local development server
[php artisan serve]

## Usage

- Access the application : Open your web browser and go to 

http://localhost:8000/admin/login  - for Admin login <br>
http://localhost:8000/login  - for Executive login

- Use the default admin credentials provided in the seeder (if available) or register a new admin user.
by default : 
E-mail : admin@gmail.com <br>
Password: password

## Contributing

- Fork the repository.
- Create a new branch (git checkout -b feature-branch).
- Commit your changes (git commit -am 'Add new feature').
- Push to the branch (git push origin feature-branch).
- Create a new Pull Request.

## License
This project is licensed under the MIT License. See the LICENSE file for details.


## Contact

For any questions or suggestions, please contact deepakdeepu101011@gmail.com.

