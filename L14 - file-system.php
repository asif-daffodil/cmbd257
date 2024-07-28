<?php
//  basename() - returns the filename of a path
echo basename($_SERVER['PHP_SELF']) . "<br>";

// dirname() - returns the directory name component of a path
echo dirname($_SERVER['PHP_SELF']) . "<br>";

// copy() - copies a file
copy("test.txt", "test2.txt");

// file() - reads a file into an array
$lines = file("test.txt");
echo "<pre>";
print_r($lines);
echo "</pre>";

// file_exists() - checks whether a file or directory exists
echo file_exists("test.txt") ? "File exists" : "File does not exist";
echo "<br>";

// file_get_contents() - reads a file into a string
echo file_get_contents("test.txt") . "<br>";

// file_put_contents() - writes a string to a file
file_put_contents("test2.txt", "Hello World\nHello World\n");

// filesize() - gets the file size
echo filesize("test.txt") . "<br>";

// filetype() - gets the file type
echo filetype("test.txt") . "<br>";

// is_dir() - checks whether the file is a directory
echo is_dir("test.txt") ? "It is a directory" : "It is not a directory";
echo "<br>";

// is_file() - checks whether the file is a file
echo is_file("test.txt") ? "It is a file" : "It is not a file";
echo "<br>";

// link() - creates a hard link
echo is_file("test3.txt") ? "File already exicts<br>" : link("test.txt", "test3.txt");

// mkdir() - creates a directory
is_dir("testDir") ? null : mkdir("testDir");

// rmdir() - removes a directory
is_dir("testDir") ? rmdir("testDir") : null;

// pathinfo() - returns information about a file path
echo "<pre>";
print_r(pathinfo("test.txt"));
echo "</pre>";
