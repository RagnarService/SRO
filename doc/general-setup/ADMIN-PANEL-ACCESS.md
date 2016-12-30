# How to get access to the AdminPanel?

- You have to register a new user.

- Go to the PServerDB that you created (Default: pserverCMS) @ [ToDo-List](https://github.com/kokspflanze/PServerCMS/blob/master/README.md#generate-the-database).

- Check the table `user2role` there you have to change the `user_role_id` entry for your user to 3.


before with no rights

![with no rights](https://raw.github.com/kokspflanze/pserverCMSFull/master/doc/images/ADMIN-ACCESS-WITHOUT-RIGHTS.png)


after with rights

![with rights](https://raw.github.com/kokspflanze/pserverCMSFull/master/doc/images/ADMIN-ACCESS-WITH-RIGHTS.png)


Than you have to relog.
