# Client History Template

## Well, Hello There...
In a nutshell, it allows you to password protect a directory of ALL projects for a specific client which:
 
(1) Allows a client to view all their web projects in one place,
(2) Prevents that directory from being indexed by google and 
(3) <strong>Helps keeps you organized as FU*^!</strong> 

### How It Works...
Just wanted to make this quick and fairly simple (base understanding of HTML/CSS & PHP helps but not required):

**Project Listing:** The PHP script runs through every root level directory (ie: "example-directory, example_directory_3, etc.") and gets the file path (used as the url), directory name, and the "screenshot.png" image (used as a pretty placeholder)

**Password Protection:** Uses simple .htaccess rules to password protect the main directory, allowing you to give your client a username and password to log in and view their work.


### Adding Your Own Projects
Treat each directory you add in here as its own separate project.<br>

You may want to house ALL your projects here and use this like a portfolio, OR, like I do: as an umbrella directory for all the work of a specific client. I typically copy this entire library and will name the root folder by the client name: "joes-pizza-shop" and inside that will be a directory for each project I do for them.

For example, maybe you're doing a corporate website for a client AND a separate landing page campaign site for them. In this case, you may create a directory called "corporate-website" for all your corporate site files and then "landing-page-site" for the latter files.

This is your world! Organize as you see fit..

*You can remove the 3 example directories I have in here and add yours as needed. Just be sure to add a "**screenshot.png**" file to the directory so the grid displays properly for your clients.

###Generate a Username/Password:
Open your "**.htaccess**" file in your preferred text editor, follow the instructions, and when prompted, copy and paste the following: "**/path-to-dir/template/protected/.htpasswd**"

It should look something like this:

    # Remove all the "#" signs below and follow the instructions under the "AuthUserFile"
    AuthType Basic
    AuthName "Login with your credentials"
    AuthUserFile /path-to-dir/template/protected/.htpasswd
    Require valid-user

Open the "**.htpasswd**" file in your text editor (located in "/your-site-path/template/protected/.htpasswd"). In their you'll see an example username and generated password:

    admin:$apr1$z1IFJjI/$65E5SM9yfVTI7uFSPGZwh.

In the case above, the username is "admin" and the password is "admin".
Go ahead and delete that because NO ONE should use those credentials... **NO ONE**.

To generate your own .htpasswd username/password [click here](http://www.htaccesstools.com/htpasswd-generator/), and then paste the code they provide you into the ".htpasswd".

..and that's IT! You're off to the races.