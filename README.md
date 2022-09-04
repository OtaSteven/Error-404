# Error-404: Group Project    |   CSUS Fall 2021
###### CSC 131-06 Computer Software Engr  |   Professor: Gary Kane
A web application that helps users display images onto the screen, whether on computer/tablet/mobile.

## RELEASE NOTES
Release notes are a technical documentation for the release or distribution of software.
#### *Sources:*
```
https://www.productplan.com/glossary/release-notes/
https://slite.com/learn/release-notes
https://github.com/github-tools/github-release-notes
```
#### *Examples:*
```
https://discord.com/developers/docs/change-log
https://community.canvaslms.com/t5/Canvas-Releases/tkb-p/canvas-release
```
## FORMAT
### *Source for Project:*
```
https://www.apachefriends.org/index.html
https://code.visualstudio.com/
https://github.com/OtaSteven/Error-404
https://trello.com/b/ywXThVd5
```
### *Header:*
- **Team Name:** Error-404
- **Team Members:** Steven Ho, Ethan Ha, Jesse Quach, Isaiah Samaniego, Yi Lei
- **Product name:** PicShowcase
- **Date of Release/Distribution:** 12/15/2021

## OVERVIEW
PicShowcase is a web application in which contain a list of pictures (received from the client) that can be display on the click of a button. Users of type Admin or Teacher will also be able to save their set of pictures and edit the sets. Parent users will only be able to view assigned sets or select group of pictures in Presentation page to present. Admin and teacher users can assign certain sets to Parent type users as well as add onto the picture table.

### Purpose:
The overall purpose of this web application is to help showcase a set of pictures and be able to move the set of pictures, either left, right, or shuffle the entire set. It also serves as a way for teacher/admin users to save certain sets and assign it to certain people so that they may view it on their own time. This is mainly used by professionals who intend to work with children in special ed courses on training their cognitive skills of observation and verification.

### Feature Summary:
- Account Setting
  - There is 2 accounts you can make (parent/teacher) as well as there being a main admin account
- Picture Selection
  - A table will be display alongside a checkbox for user selection; however the number of selected pictures is cap at 12 and a minimum of 3 picture must be selected
- Search Bar
  - Usually on top of picture selection table
  - Makes it easier to find objects or category of the objects
  - Can search by id, category, or name
- Present Button
  - Directs the user to another page where picture is expanded a bit more
- Move Feature
  - In present page, there will be left, right, and shuffle button feature that will move the pictures
- Save Set
  - Save set appears in the picture selection screen and it will save the selected pictures together as 1 set
- Set
  - Each set has 2 buttons: present and edit
  - Present button sends you to the present page and it will present the chosen set
  - Edit button will send you to an editor page that will allow users to edit the chosen set
- Editor
  - Allows you to edit a set name or pictures

#### *Issue Summary:*
- Bug 1: Assigning sets to parent user doesn’t keep the bottom table as the selected option when saved; will always show Test 1 on top of the options instead of what that assign set is
- Bug 2: Search bar gets any row that has the same wording that is type into it; doesn’t filter to one specific thing
- Bug 3: Users can have the same username and emails; duplicate accounts

#### *Steps to Reproduce:*
- Bug 1:
  - Sign in as a teacher/admin user
  - Go to Settings
  - Assign a parent a set and see that the selected option doesn’t stay on top of the selection list
- Bug 2:
  - Go to any search bar in our web app and type in similar wording, will bring up either one or multiple rows
- Bug 3:
  - When creating an account, you will get no errors for having similar or exactly the same username, email, or password
#### *End-User Impact:*
- Bug 1:
  - Doesn’t impact the product in any ways, would still save the selected set to that user
- Bug 2:
  - May cause annoyance when trying to just search for one specific item
- Bug 3:
  - Could mix-up teachers/admin users when assigning sets to a specific parent
  - Unable to identify if this may be the correct user

## INSTALLATION
XAMPP (server and database)
- Step 1: Go to *https://www.apachefriends.org/index.html*
- Step 2: Install the appropriate XAMPP depending on your computer/laptop
- Step 3: Follow the installation step and make sure not to unselect any components
- Step 4: After installation, run the XAMPP control panel and config the Apache module in Apache (*httpd.conf*)
- Step 5: Scroll a bit until you find Listen: 80 and change it to Listen: 8080
- Step 6: Turn on (start) Apache and MySql service
- Step 7: Go to Google chrome or any internet search engine and type on the url bar: localhost:8080 to make sure that the server is working; if not go back to step 5 and check setting for Apache
- Step 8: Now move our folder: WebContent to the folder: *OS/xampp/htdocs*
- Step 9: After checking that the server is working on the *localhost:8080/dashboard* and our folder is in htdocs of XAMPP, click on *phpMyAdmin* on the top right in the dashboard
- Step 10: In *phpMyAdmin*, create a new folder name *projectaccount* (**requires name**) and import the **.sql files** that are inside the folder database (location: *WebContent/database*)
- Step 11: Now you can start our website by typing: *localhost:8080/WebContent/Home.php*

#### *DISCLAIMER*
Our product is not meant for production yet. It is still in the alpha stage of development and would need to be review by a group of people for feedback.

### Contacts
- Steven Ho | *sho8517@gmail.com*
- Ethan Ha | *ethannicha@gmail.com*
- Jesse Quach | *jessequach@csus.edu*
- Isaiah Samaniego | *daniellosamaniego@csus.edu*
- Yi Lei | *YiLei@csus.edu*
