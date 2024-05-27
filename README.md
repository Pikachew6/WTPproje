### Project Structure

1. **HTML Files:**
   - `index.html`: The main page where users can login.
   - `signup.html`: Allows users to register for an account.
   - `home.html`: The home page of the application, accessible after login.
   - `profile.html`: Allows users to view and edit their profile information.
   - `aboutus.html` and `contact.html`: Information pages about the application and contact details.

2. **PHP Files:**
   - `config.php`: Contains configuration settings and establishes a database connection.
   - `signup_process.php`: Handles user registration, inserting new user data into the database.
   - `login_process.php`: Handles user login, verifying credentials against the database.
   - `profile_process.php`: Handles profile updates, allowing users to change their profile information.
   - Other PHP files perform similar backend operations.

3. **CSS Files:**
   - `style.css`: Stylesheet for the entire application, controlling the layout, colors, and appearance.

4. **Image Files:**
   - Contains images used in the application, such as the logo.

### Functionality

**User Authentication:**
- Users can register for an account (signup.html) by providing a username, email, age, and password. PHP script signup_process.php handles the registration process, verifying if the email already exists and inserting new user data into the database.
- Registered users can login (index.html) with their username and password. PHP script login_process.php verifies the credentials against the database.
- After successful login, users are redirected to the home page (home.html).

**Profile Management:**
- Users can view and edit their profile information (profile.html). PHP script profile_process.php handles profile updates, allowing users to change their username, email, age, and password.
- Logout functionality is available (index.html), which ends the user session and redirects them to the login page.

**Navigation:**
- The navigation bar (navbar) is consistent across pages and allows users to navigate between different sections of the application (home.html, aboutus.html, contact.html, profile.html).

**Responsive Design:**
- The application is designed to be responsive, ensuring optimal viewing and interaction across various devices and screen sizes.

### Additional Information

- **Session Management:** PHP session management is used to keep track of user authentication status.
- **Database:** The application likely uses a MySQL or similar database to store user information.
- **Security:** Prepared statements are used in PHP to prevent SQL injection attacks.
- **External Libraries:** The application utilizes the Boxicons library for icons and potentially other external resources for styling and functionality.
