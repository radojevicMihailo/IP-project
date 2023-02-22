# IP-project
<h2>Project from the subject Internet programming for the January and February exam period of the 2022/23 school year</h2>

Realize a web application that serves for the organization and promotion of art workshops. There are three types of users: participant, organizer and administrator.

All users should be allowed to log into the system using their credentials (username and password). The user has the option to continue working with the rest of the system after correctly entering the data. In case of incorrectly entered data, display the corresponding message. In addition to logging into the system, the user should be able to change the password when successfully logged in. In case of forgotten password, enable the user to reset the password via e-mail. The cancellation is carried out by the user receiving a password cancellation form, with a single text field, in which he should enter his e-mail address and confirm it. The system then automatically generates a new temporary password, which meets the password criteria, and sends it to the specified e-mail address (optionally, instead of a temporary password, the system can also send a temporary link for the user to set a new password). The user is obliged to change that temporary password within the next 30 minutes (optionally, the duration of the temporary link for setting a new password is the same).

If the user does not have a user account (not registered in the system), enable the registration of a new user account. The administrator should be able to log in through another form, which is not publicly visible (access to the administrator's log-in form should be on a separate route compared to the initial log-in form for other users).

Participant registration should require entering the following information:
- Name,
- surname,
- username (which is unique, at the level of all users in the system),
- password^1 (and password confirmation),
- Contact phone,
- e-mail address (unique, maximum one user account per e-mail address).
When registering the organizer, optionally enable the entry of the following fields:
- name of the organization,
- the address of the organization's headquarters (country, city, postal code, street and number),
- registration number of the organization.

If the data is entered correctly (perform some basic checks using JavaScript technology) a new registration request should be created. During registration, the user can also send his profile picture (min. size 100x100 px, and max. size 300x300 px, in JPG/PNG format; images in the application must be entered via the FileUpload window, and it is not an acceptable solution to upload them manually entered, or to be entered externally via a link to an image, which has already been placed somewhere). The administrator is in charge of considering received requests, and the outcome can be acceptance or rejection of the request (if he accepts, the status is "active", and if he rejects, the status is "inactive"). A new organizer can be entered directly into the system by the administrator.

When changing the password, in addition to entering the old password, the user must also enter the new password twice. If the old password is not good or the new password is not in the required password format, a corresponding message should be displayed. Once the password is successfully changed, log the user out of the system and return them to the initial login screen. Changing the password should be enabled for all users of the system.

**<h4>Unregistered user</h4>**

An unregistered user sees all current workshops that exist in the system. For each workshop, show basic information (main image, name, date of the workshop, venue and short description), without the possibility of going into the details of the workshop. Make it possible to search for workshops by name and/or venue (make it possible to search individually and according to both criteria). After receiving the results, which meet the required criteria, enable sorting according to the name of the workshop or according to the date of the workshop.

In addition, the unregistered user also sees the "top 5" workshops, which are the workshops that the participants marked as their favorite the most times.

**<h4>User</h4>**

After successfully logging into the system, the participant sees the main menu, which consists of the items described below. The first item in the main menu is "Profile". Within the profile, the participant can:
• see your basic data and can update them (allow to update your profile picture);
• see a tabular representation of all the workshops he attended (enable sorting by the values of all columns in the table);
• see all your actions in the application; user actions (all user likes and all comments) should be displayed in separate sections; enable withdraw likes and update/delete comments.

The second main menu item is "Workshops". The participant sees the section with the workshops to which he is currently registered. If there are more than 12 hours left until the start of the workshop, allow the participant to cancel the arrival (withdraw the application).

The participant also sees all current workshops in the system (enable the same view as for a non-registered user). Unlike a non-registered user, a participant can go to a separate page with workshop details. On the workshop details page, the participant sees a longer description of the workshop, an image gallery (use Bootstrap), and a map of the workshop venue. The map must be dynamic, loaded via a specific interactive component. On the map, it is necessary to mark the venue with a certain mark (eg with a flag) and enable zoom in and zoom out options.

If there are still free places in the workshop, the participant sees the "Register me" button. By pressing the "Register me" button, the user reserves a place, and the organizer will decide on the specific acceptance.

If the participant has already participated in a workshop of the same name in the past, enable him to mark that he likes the workshop, as well as to see all other likes. Also, the participant can see comments on the workshop, as well as leave a comment himself.

The third menu item is "Become an Organizer". The participant has the possibility to propose the workshop himself, by entering the main image (as a file), the name of the workshop, the venue and the date of the event, a short description, a longer description, and an optional couple of images for the gallery, up to five images (enable to add via one form, and not sending file by file to the server). These requests will be considered by the administrator, and if he accepts the request, the participant becomes the organizer.

**<h4>Organizer</h4>

The organizer is in charge of working with the workshops. When reviewing all workshops, for workshops that he has created, the organizer has the option of editing such workshops. The organizer can edit the workshop information (including images), can accept workshop applications and can cancel the workshop. When canceling the workshop, send an e-mail notification to all registered participants.

The organizer can add a new workshop. When adding a workshop, all fields are entered (workshop name, workshop date, venue, short description, longer description, main image and image gallery). The organizer can also add a workshop by selecting a template (the content of one of his previous workshops) from the drop-down list. New workshops will need to be approved by an administrator.

**<h4>Administrator</h4>**

The administrator is a user with special privileges: he should be enabled to work with participants and organizers, as well as with workshops.

The administrator can see all system users (participants and organizers), update them, delete them, or add a new participant/organizer. It can also review registration requests. A request that is rejected (status is "inactive"), prevents the user from trying to register again with the same username.

In addition to working with users, the administrator sees all workshops, and can update them, delete them or add a new workshop. In addition, see all proposals for new workshops, from participants or organizers. If the administrator wants to approve a participant's proposal, then that participant must not have any current applications for an ongoing workshop. Only when the condition is satisfied, the administrator gets the opportunity to promote the participant to the organizer.

**<h4>Other features of application</h4>**

It is necessary to create a uniform appearance of the application using CSS - Cascading Style Sheets. Each page should contain a menu and a header and footer. On all screens where the desired content is displayed, the option to return to the home screen with user options should be enabled (this only if you do not have a menu that is always visible). All screens also require a link that leads to the initial login screen (option: Log out). In data entry forms, perform the necessary validations on the client side, using JavaScript technology. The web application should be adaptable to both smaller and larger screens ("responsive web design"). Test the web application in at least 3 standard web browsers.
