# Hacker News

<img src="https://media.giphy.com/media/oVvhEYvWDvE1G/giphy.gif" width="75%">

## :shipit: About

This is an individual school assignment with a main focus on PHP. We were supposed to create a new and improved clone of the website [Hacker News](https://news.ycombinator.com/news). The project had to include the default features of the original page plus the following user stories and requirements:

<details><summary> :bust_in_silhouette: <b> User stories:</b></summary>

- As a user I should be able to create an account.
- As a user I should be able to login.
- As a user I should be able to logout.
- As a user I should be able to edit my account email, password and biography.
- As a user I should be able to upload a profile avatar image.
- As a user I should be able to create new posts with title, link and description.
- As a user I should be able to edit my posts.
- As a user I should be able to delete my posts.
- As a user I'm able to view most upvoted posts.
- As a user I'm able to view new posts.
- As a user I should be able to upvote posts.
- As a user I should be able to remove upvote from posts.
- As a user I'm able to comment on a post.
- As a user I'm able to edit my comments.
- As a user I'm able to delete my comments.

</details>

<details><summary> :books: <b> Requirements:</b> </summary>

- The application should be written in HTML, CSS, JavaScript, SQL and PHP.
- The application should be built using a SQLite database with at least four different tables.
- The application should be pushed to a public repository on [GitHub](https://github.com/).
- The application should be responsive and be built using the method mobile-first.
- The application should be implement secure [hashed passwords](https://secure.php.net/manual/en/function.password-hash.php) when signing up. <br>
- The project should contain the files and directories in the [`resources`](resources) folder in the root of your repository. <br>
- The project should implement an [accessible](https://a11yproject.com/checklist/) [graphical user interface](https://en.m.wikipedia.org/wiki/Graphical_user_interface).
- The project should [declare strict types](https://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration.strict) in files containing only PHP code.
- The project should not include any coding errors, warning or notices.
- The project must be tested on at least two of your classmates computers. Add the testers name to the `README.md` file.
- The project must receive a [code review](https://en.m.wikipedia.org/wiki/Code_review) by another student. Add at least 10 comments to the student's `README.md` file through a [pull request](https://help.github.com/en/articles/creating-a-pull-request). Give feedback to the student below your name. The last student gives feedback to the first student in the list. Add your feedback one day before the presentation.

</details>

<details><summary> :robot: <b> Database structure:</b> </summary>

<img src="/public/resources/media/db.png">

</details>

## :octocat: Instructions

_ATTN: A prerequisite - In order to do this you will need to have PHP installed on your computer._

1. Clone or fork this repository to your computer.
2. Open up your terminal and `cd` into the project folder.
3. Create a local server by using the following command: `php -S localhost:1337`
4. Open in your browser, write the name of your localhost in the url followed by `/public/index.php` and access the project from there.

## :computer: Testers

- [Réka Madarasz](https://github.com/mreka91)
- [Ida From](https://github.com/Fvrom)

## :mag: Code Review

<b>By [Victor Stranne](https://github.com/Vstranne)</b>

- [ ] **index.php:L25-27**I personally prefer not having too much logic in the same file as my HTML. Instead of doing the database query here you could've define a function in your functions.php and instead just do something like: "$postAuthor = postAuthor($pdo, $articlePost['user_id'];".
- [x] **header.php:L18** You have a commented line here which you don't seem to use at all, perhaps remove it entirely to make the code look even more awesome!
- [ ] **functions.php:L97-99**Instead of ordering by newest with PHP perhaps you could order them directly with the SQL query. Just add "ORDER BY comment_created DESC" at the end of your SQL query! (You might need to add timestamps in seconds in the database table column in order for this to work, but it would be cleaner code ;) )
- [x] **media-queries.css** This file doesn't contain anything :( perhaps just remove it!
- [x] **/posts/gui-add-confirm.php** also empty :(
- [ ] **index.php:L24**In general I like your naming in the code, but here you write "foreach ($allPosts as $articlePost)", I prefer to have the same name and just change from plural to singular, "foreach($posts as $post)". I think it makes it easier to read!
- [ ] The first thing you meet when entering the site is a login screen, for future sites like this perhaps let people access some of the content without making an account to keep them on the site.
- [ ] The naming on some of your files isn't intuitive for me of what it actually is, perhaps don't use abbreviations when naming files, or anything at all!
- [x] Your code is well commented, not too much but where it's needed, keep it up!
- [x] You have a great structure in your project :) great job!
  > "I think you've done a really good job here, the site looks awesome and the code is very well written!" - Victor Stranne

## :sparkles: Bonus Features

<b>By [Agnes Binett](https://github.com/aagneess)</b> - Thank you! :rose:
<br>

- An add on making it possible for users to delete their account along with all data stored onto that particular user.<br>
  <i>Link to pull request, [here](https://github.com/mogrim-91/Hacker-News/pull/2).</i>
- An second feature making it possible for users to reply to comments.<br>
  <i>Link to pull request, [here](https://github.com/mogrim-91/Hacker-News/pull/3).</i>

## :man_technologist: Creator

<b>[Dante Mogrim](https://github.com/dantemogrim)</b>

## :fleur_de_lis: License

[MIT](https://en.wikipedia.org/wiki/MIT_License)
