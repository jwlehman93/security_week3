# Project 3 - Globitek Cookies/Sessions

Time spent: **1** hours spent in total

## User Stories

The following **required** functionality is completed:

- [x] Test for vulnerabilities
  - Run all three provided pen tests

- [x] Configure sessions.
  - [x] Only allow session IDs to come from cookies
  - [x] Expire after one day
  - [x] Use cookies which are marked as HttpOnly
- [ ] Login page.
  - [ ] An error message for when the username is not found
  - [ ] An error message for when the username is found but the password does not match
  - [ ] After a successful login, store the user's ID in the session data (as "user_id").
  - [ ] After a successful login, store the user's last login time in the session data (as "last_login").
  - [ ] Regenerate the session ID at the appropriate point to prevent Session Fixation.
- [ ] Require login to access staff area pages
  - [ ] Add a login requirement to almost all staff area pages. 
  - [ ] Determine which two pages do not need to require a login.
  - [ ] Write code which will only consider a request as being "recent" if the user's last login was less than 1 day ago.
- [ ] Logout page.
  - [ ]  Add code to destroy the user's session file after logging out.
- [ ] Add CSRF protections to the state forms.
  - [ ] The forms in "public/staff/states/" are new.php and edit.php. Add CSRF tokens to these forms and compare them against the stored version of the token before accepting the form.
  - [ ] Only process forms data sent by POST requests. (This is already the case unless you change it.)
  - [ ] Confirm that the referer sent in the requests is from the same domain as the host.
  - [ ] Create a CSRF token.
  - [ ] Store the CSRF token in the user's session.
  - [ ] Add the same CSRF token to the login form as a hidden input.
  - [ ] When submitted, confirm that session and form tokens match.
  - [ ] If the tokens do not match, you can should show a simple error message which says "Error: invalid request" and exits.
  - [ ] Make sure that legitimate use of the states/new.php and states/edit.php pages by a logged-in user still works as expected.
- [ ] Ensure the application is not vulnerable to XSS attacks. (Tips)

- [ ] Ensure the application is not vulnerable to SQL Injection attacks. (Tips)

- [ ] Run all tests from Objective 1 again and confirm that your application is no longer vulnerable to any test.

The following advanced user stories are **optional**:

- [ ] **Bonus Objective 1**: Objective #4 (requiring login on staff pages) has a major security weakness because it does not follow one of the fundamental security principals. Identify the principal and write a short description of how the code could be modified to be more secure. Include your answer in the README file that accompanies your assignment submission.

- [ ] **Bonus Objective 2**: Add CSRF tokens and protections to all of the forms in the staff directory (new, edit, delete). Make sure the request is the same domain and that the CSRF token is valid.

- [ ] **Bonus Objective 3**: Add code so that CSRF tokens will only be considered valid for 10 minutes after creation.

- [ ] **Bonus Objective 4**: Only consider a session valid if the user-agent string matches the value used when the user last logged in successfully.

- [ ] **Advanced Objective**: Create two new pages called "public/set\_secret\_cookie.php" and "public/get\_secret\_cookie.php". The first page will set a cookie with the name "scrt" and the value "I have a secret to tell.". Before storing the cookie, you need to both encrypt it and sign it. You can use any (two-way) encryption algorithm you prefer. When the second page loads, it should read the cookie with the name "scrt", and then—if it is signed correctly—decrypt it. If it is not signed correctly then it should display an error message and skip decryption altogether.

