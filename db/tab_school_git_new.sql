-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 06:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tab_school_git_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadmicdetails`
--

CREATE TABLE IF NOT EXISTS `acadmicdetails` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unniversity` varchar(255) NOT NULL,
  `subjects` text NOT NULL,
  `coursesPrograms` text NOT NULL,
  `semesterYear` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `book_name` varchar(300) NOT NULL,
  `author_name` varchar(300) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `price` varchar(300) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `pages` varchar(100) NOT NULL,
  `pub_year` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL DEFAULT '',
  `temp_name` varchar(200) NOT NULL DEFAULT '',
  `booktext` longtext NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `book_name`, `author_name`, `publisher_name`, `price`, `description`, `pages`, `pub_year`, `path`, `temp_name`, `booktext`, `status`, `created_at`) VALUES
(2, 1, 'Class X CBSE - Mathematics - Full Video Lessons', 'ExamFear', 'Exam Fear', '250', 'We are a bunch of people with desired skills & qualifications who are passionate about teaching. \r\nWe want to promote free quality education throughout the world. \r\nExamFear is a one stop platform that provides FREE Quality education. We have a huge number of educational video lessons on Physics, Mathematics, Biology & Chemistry with concepts & tricks never explained so well before. \r\nWe have tied up with NGOs to provide FREE Quality Education in India as well. If you are an NGO & want to use these video lessons for FREE , please contact us. \r\nWe upload new video lessons everyday.', '170', '1960', './assets/uploads/books/333b591c7e8bb14516e58e717c67a009.pdf', '', '', 1, '2017-11-15 20:39:33'),
(3, 1, 'Class X Mathematics - Arithmetic Progressions', 'eVidyarthi', 'eVidyarthi', '120', 'eVidyarthi is a educational content provider which believes in giving access to free education to all. It a group of well trained and seasoned faculties which provide students of primary & secondry school knowledge & easy understanding of all the subjects. eVidhyarthi tries to educate students in the most simpliest manner so that their is the a progress in student''s growth. Watch & do provide us your feedback', '250', '2000', './assets/uploads/books/99bdb4fe76c28e5749559ddfc375956d.pdf', '', '', 1, '2017-11-15 20:39:03'),
(4, 4, 'Mathematics', 'mathematics author', 'tester', '100', 'this is test book', '250', '2000', './assets/uploads/books/09068f0c278ec5ff9cc984bc918e4086.pdf', '', '', 1, '2017-11-15 20:38:37'),
(5, 3, 'Rosa Meena Count Your Chickens', 'Mukul chandra', 'Ritesh', '10', 'this  is the test education board', '50', '1201', './assets/uploads/books/874cbbb929a1c23c75e6976507fb86b8.PDF', '', '', 1, '2017-11-15 20:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `category_description`, `status`, `created_at`) VALUES
(1, 'Science', 'science', 'this is the category description', 1, '2017-11-06 00:52:25'),
(3, 'Marketing', 'marketing', 'this is the description', 1, '2017-11-06 01:07:48'),
(4, 'Maths', 'maths', 'tester', 1, '2017-11-08 04:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `institute_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `start_HH` varchar(10) NOT NULL,
  `start_MM` varchar(10) NOT NULL,
  `start_meridian` varchar(5) NOT NULL,
  `end_HH` varchar(10) NOT NULL,
  `end_MM` varchar(10) NOT NULL,
  `end_meridian` varchar(5) NOT NULL,
  `course` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `yearSemester` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `filtered` longtext NOT NULL,
  `library_id` varchar(200) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `user_id`, `institute_id`, `title`, `description`, `startDate`, `endDate`, `start_HH`, `start_MM`, `start_meridian`, `end_HH`, `end_MM`, `end_meridian`, `course`, `branch`, `semester`, `subject`, `yearSemester`, `content`, `filtered`, `library_id`, `fileName`, `created_at`) VALUES
(1, 59, 56, 'this is my demo content', 'this is the test description for that', '2017-11-04', '2017-11-04', '', 'MM', 'AM', 'HH', 'MM', 'AM', 4, 5, 6, 16, '', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"294fe46b-ab76-4ef2-b3b9-0781552ff25a\\"},\\"text\\":\\"<p>Fill in the following blank are mentioned below<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":50,\\"feedback\\":\\"correct\\"},{\\"from\\":51,\\"to\\":100,\\"feedback\\":\\"correct\\"}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>there are *7* wonder in the world.<\\/p>\\\\n\\",\\"<p>*cow*&nbsp; is the nation animal.<\\/p>\\\\n\\"]}"', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"294fe46b-ab76-4ef2-b3b9-0781552ff25a\\"},\\"text\\":\\"<p>Fill in the following blank are mentioned below<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":50,\\"feedback\\":\\"correct\\"},{\\"from\\":51,\\"to\\":100,\\"feedback\\":\\"correct\\"}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>there are *7* wonder in the world.<\\/p>\\\\n\\",\\"<p>*cow*&nbsp; is the nation animal.<\\/p>\\\\n\\"]}"', 'H5P.Blanks 1.8', '', '0000-00-00 00:00:00'),
(2, 59, 56, 'Teaster', 'This the test for that', '2017-11-07', '2017-11-08', '2', '10', 'AM', '3', '18', 'AM', 5, 6, 4, 12, '', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"6a4f4a66-23d4-4f65-92f4-e8e6cd50ad25\\"},\\"text\\":\\"<p>Find out this words&nbsp;<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>*delhi* is the capital of the india<\\/p>\\\\n\\",\\"<p>*Bhopal* is the capital of madhya pradesh<\\/p>\\\\n\\"]}"', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"6a4f4a66-23d4-4f65-92f4-e8e6cd50ad25\\"},\\"text\\":\\"<p>Find out this words&nbsp;<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>*delhi* is the capital of the india<\\/p>\\\\n\\",\\"<p>*Bhopal* is the capital of madhya pradesh<\\/p>\\\\n\\"]}"', 'H5P.Blanks 1.8', '', '2017-11-30 11:00:00'),
(3, 59, 56, 'Demo', 'Demo', '2017-11-07', '2017-11-29', '3', '17', 'PM', '10', '17', 'PM', 5, 6, 4, 9, '', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"a7deca71-327b-47af-844a-98a107de6e60\\"},\\"text\\":\\"<p>this is the demo malik<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100,\\"feedback\\":\\"gggdgds\\"}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>*Demo* for me&nbsp;<\\/p>\\\\n\\"]}"', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"a7deca71-327b-47af-844a-98a107de6e60\\"},\\"text\\":\\"<p>this is the demo malik<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100,\\"feedback\\":\\"gggdgds\\"}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>*Demo* for me&nbsp;<\\/p>\\\\n\\"]}"', 'H5P.Blanks 1.8', '', '0000-00-00 00:00:00'),
(4, 68, 66, 'H5p Demo', 'Dummy test', '2017-11-08', '2017-11-10', '11', '23', 'PM', '12', '4', 'PM', 7, 9, 8, 20, '', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"f4447558-ee88-4360-aed3-165a8f25782b\\"},\\"text\\":\\"Fill in the missing words\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":false,\\"autoCheck\\":false,\\"caseSensitive\\":false,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>India is a vast South *Asian* country with diverse terrain \\u2013 from Himalayan peaks to Indian *Ocean* coastline \\u2013 and history reaching back 5 millennia. In the north, Mughal *Empire* landmarks include Delhi\\u2019s Red Fort complex and massive Jama Masjid mosque, plus Agra\\u2019s iconic *Taj Mahal* mausoleum. Pilgrims bathe in the holy river of *Ganges* in Varanasi, and *Rishikesh* is a yoga centre and base for Himalayan trekking.<\\/p>\\\\n\\"]}"', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"f4447558-ee88-4360-aed3-165a8f25782b\\"},\\"text\\":\\"Fill in the missing words\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":false,\\"autoCheck\\":false,\\"caseSensitive\\":false,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>India is a vast South *Asian* country with diverse terrain \\u2013 from Himalayan peaks to Indian *Ocean* coastline \\u2013 and history reaching back 5 millennia. In the north, Mughal *Empire* landmarks include Delhi\\u2019s Red Fort complex and massive Jama Masjid mosque, plus Agra\\u2019s iconic *Taj Mahal* mausoleum. Pilgrims bathe in the holy river of *Ganges* in Varanasi, and *Rishikesh* is a yoga centre and base for Himalayan trekking.<\\/p>\\\\n\\"]}"', 'H5P.Blanks 1.8', '', '0000-00-00 00:00:00'),
(5, 64, 61, 'this is my title for that', 'this is the  test world description', '2017-11-19', '2017-11-21', '2', '2', 'AM', 'HH', '', 'AM', 6, 8, 7, 17, '', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"ed11b22d-ebd3-47f9-aa99-198d30faeb05\\"},\\"text\\":\\"<p>this is the world number one sit *wordpress*<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\"}"', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"ed11b22d-ebd3-47f9-aa99-198d30faeb05\\"},\\"text\\":\\"<p>this is the world number one sit *wordpress*<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\"}"', 'H5P.Blanks 1.8', '', '2017-11-30 12:30:00'),
(6, 68, 66, 'Work In Mathematics For Sem One', 'That is task for semester first student', '2017-11-22', '2017-11-23', '1', '10', 'AM', '6', '10', 'PM', 7, 9, 8, 20, '', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"fa95061a-00a2-46c9-9f5a-7ed5555b93fe\\"},\\"text\\":\\"<p>Please file the word for blanks<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":50,\\"feedback\\":\\"Test\\"},{\\"from\\":51,\\"to\\":100,\\"feedback\\":\\"Test\\"}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>*Bhopal* is the capital of in madhya prdesh<\\/p>\\\\n\\",\\"<p>*Delhi* is the capital of india<\\/p>\\\\n\\"]}"', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"fa95061a-00a2-46c9-9f5a-7ed5555b93fe\\"},\\"text\\":\\"<p>Please file the word for blanks<\\/p>\\\\n\\",\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":50,\\"feedback\\":\\"Test\\"},{\\"from\\":51,\\"to\\":100,\\"feedback\\":\\"Test\\"}],\\"showSolutions\\":\\"Show solution\\",\\"tryAgain\\":\\"Retry\\",\\"checkAnswer\\":\\"Check\\",\\"notFilledOut\\":\\"Please fill in all blanks to view solution\\",\\"answerIsCorrect\\":\\"'':ans'' is correct\\",\\"answerIsWrong\\":\\"'':ans'' is wrong\\",\\"answeredCorrectly\\":\\"Answered correctly\\",\\"answeredIncorrectly\\":\\"Answered incorrectly\\",\\"solutionLabel\\":\\"Correct answer:\\",\\"inputLabel\\":\\"Blank input @num of @total\\",\\"inputHasTipLabel\\":\\"Tip available\\",\\"tipLabel\\":\\"Tip\\",\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"autoCheck\\":false,\\"caseSensitive\\":true,\\"showSolutionsRequiresInput\\":true,\\"separateLines\\":false,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"acceptSpellingErrors\\":false},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"questions\\":[\\"<p>*Bhopal* is the capital of in madhya prdesh<\\/p>\\\\n\\",\\"<p>*Delhi* is the capital of india<\\/p>\\\\n\\"]}"', 'H5P.Blanks 1.8', '', '0000-00-00 00:00:00'),
(7, 68, 66, 'Multiple choice question for semester first', 'this is the test description', '2017-11-24', '2017-11-25', '1', '17', 'AM', '10', '16', 'AM', 7, 9, 8, 21, '', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"9cfc894a-7b29-488b-8fd6-80299ee134ed\\"},\\"answers\\":[{\\"correct\\":false,\\"tipsAndFeedback\\":{\\"tip\\":\\"\\",\\"chosenFeedback\\":\\"\\",\\"notChosenFeedback\\":\\"\\"},\\"text\\":\\"<div>Mahatma Gandhi<\\/div>\\\\n\\"},{\\"correct\\":false,\\"tipsAndFeedback\\":{\\"tip\\":\\"\\",\\"chosenFeedback\\":\\"\\",\\"notChosenFeedback\\":\\"\\"},\\"text\\":\\"<div>Shubash chandra bos<\\/div>\\\\n\\"},{\\"correct\\":true,\\"tipsAndFeedback\\":{\\"tip\\":\\"\\",\\"chosenFeedback\\":\\"\\",\\"notChosenFeedback\\":\\"\\"},\\"text\\":\\"<div>Dr. Rajendra prasad<\\/div>\\\\n\\"}],\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"UI\\":{\\"checkAnswerButton\\":\\"Check\\",\\"showSolutionButton\\":\\"Show solution\\",\\"tryAgainButton\\":\\"Retry\\",\\"tipsLabel\\":\\"Show tip\\",\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"tipAvailable\\":\\"Tip available\\",\\"feedbackAvailable\\":\\"Feedback available\\",\\"readFeedback\\":\\"Read feedback\\",\\"wrongAnswer\\":\\"Wrong answer\\",\\"correctAnswer\\":\\"Correct answer\\",\\"shouldCheck\\":\\"Should have been checked\\",\\"shouldNotCheck\\":\\"Should not have been checked\\",\\"noInput\\":\\"Please answer before viewing the solution\\"},\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"type\\":\\"auto\\",\\"singlePoint\\":false,\\"randomAnswers\\":true,\\"showSolutionsRequiresInput\\":true,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"autoCheck\\":false,\\"passPercentage\\":100,\\"showScorePoints\\":true},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"question\\":\\"<p>Who is the first president of India<\\/p>\\\\n\\"}"', '"{\\"media\\":{\\"params\\":{\\"contentName\\":\\"Image\\"},\\"library\\":\\"H5P.Image 1.0\\",\\"subContentId\\":\\"9cfc894a-7b29-488b-8fd6-80299ee134ed\\"},\\"answers\\":[{\\"correct\\":false,\\"tipsAndFeedback\\":{\\"tip\\":\\"\\",\\"chosenFeedback\\":\\"\\",\\"notChosenFeedback\\":\\"\\"},\\"text\\":\\"<div>Mahatma Gandhi<\\/div>\\\\n\\"},{\\"correct\\":false,\\"tipsAndFeedback\\":{\\"tip\\":\\"\\",\\"chosenFeedback\\":\\"\\",\\"notChosenFeedback\\":\\"\\"},\\"text\\":\\"<div>Shubash chandra bos<\\/div>\\\\n\\"},{\\"correct\\":true,\\"tipsAndFeedback\\":{\\"tip\\":\\"\\",\\"chosenFeedback\\":\\"\\",\\"notChosenFeedback\\":\\"\\"},\\"text\\":\\"<div>Dr. Rajendra prasad<\\/div>\\\\n\\"}],\\"overallFeedback\\":[{\\"from\\":0,\\"to\\":100}],\\"UI\\":{\\"checkAnswerButton\\":\\"Check\\",\\"showSolutionButton\\":\\"Show solution\\",\\"tryAgainButton\\":\\"Retry\\",\\"tipsLabel\\":\\"Show tip\\",\\"scoreBarLabel\\":\\"You got :num out of :total points\\",\\"tipAvailable\\":\\"Tip available\\",\\"feedbackAvailable\\":\\"Feedback available\\",\\"readFeedback\\":\\"Read feedback\\",\\"wrongAnswer\\":\\"Wrong answer\\",\\"correctAnswer\\":\\"Correct answer\\",\\"shouldCheck\\":\\"Should have been checked\\",\\"shouldNotCheck\\":\\"Should not have been checked\\",\\"noInput\\":\\"Please answer before viewing the solution\\"},\\"behaviour\\":{\\"enableRetry\\":true,\\"enableSolutionsButton\\":true,\\"type\\":\\"auto\\",\\"singlePoint\\":false,\\"randomAnswers\\":true,\\"showSolutionsRequiresInput\\":true,\\"disableImageZooming\\":false,\\"confirmCheckDialog\\":false,\\"confirmRetryDialog\\":false,\\"autoCheck\\":false,\\"passPercentage\\":100,\\"showScorePoints\\":true},\\"confirmCheck\\":{\\"header\\":\\"Finish ?\\",\\"body\\":\\"Are you sure you wish to finish ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Finish\\"},\\"confirmRetry\\":{\\"header\\":\\"Retry ?\\",\\"body\\":\\"Are you sure you wish to retry ?\\",\\"cancelLabel\\":\\"Cancel\\",\\"confirmLabel\\":\\"Confirm\\"},\\"question\\":\\"<p>Who is the first president of India<\\/p>\\\\n\\"}"', 'H5P.MultiChoice 1.10', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `content_notification_status`
--

CREATE TABLE IF NOT EXISTS `content_notification_status` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `content_id` int(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_notification_status`
--

INSERT INTO `content_notification_status` (`id`, `user_id`, `content_id`, `status`) VALUES
(2, 67, 7, '1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `institute_id` int(255) DEFAULT NULL,
  `course_category_id` int(11) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `duration_year_sem_months` varchar(50) NOT NULL,
  `status` tinyint(10) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `institute_id`, `course_category_id`, `course_name`, `duration_year_sem_months`, `status`, `create_time`, `update_time`) VALUES
(1, 30, 2, 'MBA', '4', 1, '2017-09-03 13:44:02', NULL),
(2, 30, 2, 'B.E', '4', 1, '2017-09-04 09:53:03', NULL),
(4, 56, 2, 'Deploma', '2', 1, '2017-10-10 07:54:31', NULL),
(5, 56, 3, 'Master engg', '1', 1, '2017-10-10 08:03:11', NULL),
(6, 61, 2, 'Course First', '6', 1, '2017-11-08 22:16:34', NULL),
(7, 66, 2, 'B.Tech', '8', 1, '2017-11-08 22:42:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_branches`
--

CREATE TABLE IF NOT EXISTS `course_branches` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `institute_id` int(255) DEFAULT NULL,
  `course_id` int(255) DEFAULT NULL,
  `branch_name` varchar(100) DEFAULT NULL,
  `status` tinyint(10) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `course_branches`
--

INSERT INTO `course_branches` (`id`, `institute_id`, `course_id`, `branch_name`, `status`, `create_time`, `update_time`) VALUES
(2, 30, 1, 'Information Technology', 1, '2017-09-03 14:17:09', '2017-09-03 14:28:38'),
(3, 30, 2, 'Computer Networking  And Hardware', 1, '2017-09-04 09:53:29', NULL),
(4, 35, 3, 'marketing', 1, '2017-09-04 10:21:11', NULL),
(5, 56, 4, 'Electric Engg.', 1, '2017-10-10 07:55:11', NULL),
(6, 56, 5, 'Computer Networking  And Hardware', 1, '2017-10-10 08:03:40', NULL),
(7, 56, 5, 'Information Technology', 1, '2017-10-10 13:52:42', NULL),
(8, 61, 6, 'Branch1', 1, '2017-11-08 22:17:02', NULL),
(9, 66, 7, 'Computer Science', 1, '2017-11-08 22:43:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE IF NOT EXISTS `course_category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `institute_id` int(10) NOT NULL,
  `course_category_name` varchar(100) DEFAULT NULL,
  `course_duration` varchar(100) DEFAULT NULL,
  `status` tinyint(10) DEFAULT NULL,
  `category_type` tinyint(2) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`id`, `institute_id`, `course_category_name`, `course_duration`, `status`, `category_type`, `create_time`, `update_time`) VALUES
(2, 120, 'Semster wise', '6', 1, 1, '2017-05-24 20:41:30', NULL),
(3, 120, 'Yearly ', '12', 1, 2, '2017-05-25 13:50:05', NULL),
(4, 120, 'xyz', '2', 1, 2, '2017-08-12 14:28:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_semester`
--

CREATE TABLE IF NOT EXISTS `course_semester` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `status` tinyint(10) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `course_semester`
--

INSERT INTO `course_semester` (`id`, `institute_id`, `semester`, `course_id`, `branch_id`, `status`, `create_time`, `update_time`) VALUES
(1, 30, '1 semester', 1, 2, 1, '2017-09-03 19:22:05', NULL),
(2, 35, 'Semester 1', 3, 4, 1, '2017-09-04 10:22:03', NULL),
(3, 56, 'role One ', 4, 5, 1, '2017-10-10 07:56:01', NULL),
(4, 56, 'Semester 1', 5, 6, 1, '2017-10-10 08:04:23', NULL),
(5, 56, 'Semester 1', 5, 7, 1, '2017-10-10 13:55:32', NULL),
(6, 56, 'role 2', 4, 5, 1, '2017-10-10 15:18:53', NULL),
(7, 61, 'Semester 1', 6, 8, 1, '2017-11-08 22:18:03', NULL),
(8, 66, 'Sem 1', 7, 9, 1, '2017-11-08 22:44:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_semester_subjects`
--

CREATE TABLE IF NOT EXISTS `course_semester_subjects` (
  `id` bigint(15) NOT NULL AUTO_INCREMENT,
  `institute_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `subject_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(10) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `course_semester_subjects`
--

INSERT INTO `course_semester_subjects` (`id`, `institute_id`, `semester_id`, `course_id`, `branch_id`, `subject_name`, `description`, `status`, `create_time`, `update_time`) VALUES
(1, 30, 1, 1, 2, 'Maths ', 'this is the demo', 1, '2017-09-03 19:22:05', NULL),
(2, 30, 1, 1, 2, '', '', 1, '2017-09-03 19:22:05', NULL),
(3, 35, 2, 3, 4, 'Sub 1', 'this is the demo', 1, '2017-09-04 10:22:03', NULL),
(4, 35, 2, 3, 4, 'sub 2', 'this is the demo', 1, '2017-09-04 10:22:03', NULL),
(5, 56, 3, 4, 5, 'Sub 1', 'this is test', 1, '2017-10-10 07:56:01', NULL),
(6, 56, 3, 4, 5, 'sub2', 'this is test', 1, '2017-10-10 07:56:02', NULL),
(7, 56, 3, 4, 5, 'sub3', 'this is test', 1, '2017-10-10 07:56:02', NULL),
(8, 56, 4, 5, 6, 'Sub 1', 'd', 1, '2017-10-10 08:04:23', NULL),
(9, 56, 4, 5, 6, 'sub 2', 'd', 1, '2017-10-10 08:04:23', NULL),
(10, 56, 4, 5, 6, 'sub 3', 'f', 1, '2017-10-10 08:04:23', NULL),
(11, 56, 4, 5, 6, 'sub 4', 'g', 1, '2017-10-10 08:04:23', NULL),
(12, 56, 5, 5, 7, 'tester', '74875', 1, '2017-10-10 13:55:32', NULL),
(13, 56, 5, 5, 7, 'Sub 1', 'this is the demo', 1, '2017-10-10 13:55:32', NULL),
(14, 56, 5, 5, 7, 'sub 2', 'This is demo', 1, '2017-10-10 13:55:32', NULL),
(15, 56, 6, 4, 5, 'this sub1', 'thisiiis ', 1, '2017-10-10 15:18:53', NULL),
(16, 56, 6, 4, 5, 'this sub2', 'this is ve', 1, '2017-10-10 15:18:54', NULL),
(17, 61, 7, 6, 8, 'S1', 'tetser', 1, '2017-11-08 22:18:03', NULL),
(18, 61, 7, 6, 8, 's2', 'tester', 1, '2017-11-08 22:18:03', NULL),
(19, 61, 7, 6, 8, 's3', 'this is the demo', 1, '2017-11-08 22:18:03', NULL),
(20, 66, 8, 7, 9, 'Computer Fundamentals', 'Fundamentals of Computer', 1, '2017-11-08 22:44:42', NULL),
(21, 66, 8, 7, 9, 'Programming with C,C++', 'Fundamentals of C', 1, '2017-11-08 22:44:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) NOT NULL,
  `template_subject` varchar(255) NOT NULL,
  `template_body` text NOT NULL,
  `template_subject_admin` varchar(255) NOT NULL,
  `template_body_admin` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `template_name`, `template_subject`, `template_body`, `template_subject_admin`, `template_body_admin`, `created_at`, `updated_at`) VALUES
(2, 'welcome', 'welcomes', 'sdsds', 'csdd', 'xcxc', '2017-07-28 07:24:07', '2017-07-28 07:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `followyourfriends`
--

CREATE TABLE IF NOT EXISTS `followyourfriends` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `friend_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `followyourstudents`
--

CREATE TABLE IF NOT EXISTS `followyourstudents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `followyourteachers`
--

CREATE TABLE IF NOT EXISTS `followyourteachers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `teacher_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE IF NOT EXISTS `libraries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `publishingYear` date NOT NULL,
  `status` tinyint(2) NOT NULL,
  `featuredImage` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `category_id`, `bookName`, `book_id`, `user_id`, `publishingYear`, `status`, `featuredImage`, `created_at`) VALUES
(1, 1, 'Class X Mathematics - Arithmetic Progressions', 3, 62, '0000-00-00', 1, '', '2017-11-15 22:30:15'),
(2, 4, 'Mathematics', 4, 62, '0000-00-00', 1, '', '2017-11-15 22:40:03'),
(5, 3, 'Rosa Meena Count Your Chickens', 5, 62, '0000-00-00', 1, '', '2017-12-03 05:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `librarycategories`
--

CREATE TABLE IF NOT EXISTS `librarycategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mybooks`
--

CREATE TABLE IF NOT EXISTS `mybooks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `libarary_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mynotes`
--

CREATE TABLE IF NOT EXISTS `mynotes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `notebook_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mynotes`
--

INSERT INTO `mynotes` (`id`, `user_id`, `notebook_id`, `title`, `description`, `status`, `create_at`) VALUES
(6, 62, 2, 'this dc', 'this si si', 1, '2017-12-03 11:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `mytasks`
--

CREATE TABLE IF NOT EXISTS `mytasks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `task` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mytasks`
--

INSERT INTO `mytasks` (`id`, `user_id`, `task`, `date`, `time`, `status`, `create_at`) VALUES
(3, 67, 'Ritesh', '2017-11-21', '2/2/AM', 1, '2017-11-21 04:43:02'),
(4, 67, 'Clear class feed test', '2017-11-22', '10/2/AM', 1, '2017-11-22 00:13:05'),
(5, 67, 'Rock world', '2017-11-22', '9/57/AM', 1, '2017-11-22 04:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `notebooks`
--

CREATE TABLE IF NOT EXISTS `notebooks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `notebook` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `create_at` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notebooks`
--

INSERT INTO `notebooks` (`id`, `user_id`, `slug`, `notebook`, `status`, `create_at`, `modified`) VALUES
(2, 62, 'exam-notebook', 'Exam NoteBook', 1, '2017-12-03 09:18:38', '0000-00-00 00:00:00'),
(3, 62, 'ddddddd', 'ddddddd', 1, '2017-12-03 11:35:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task_notification_status`
--

CREATE TABLE IF NOT EXISTS `task_notification_status` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `task_id` int(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `msg_status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `task_notification_status`
--

INSERT INTO `task_notification_status` (`id`, `user_id`, `task_id`, `status`, `msg_status`) VALUES
(2, 67, 5, '1', '1'),
(3, 67, 4, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `logn_status` tinyint(2) NOT NULL,
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `course_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `enrollment_number` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `follow_teacher_ids` text NOT NULL,
  `qoute` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birthday` varchar(45) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `fatherName` varchar(100) DEFAULT NULL,
  `motherName` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `coverImage` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) NOT NULL,
  `cover_photo` varchar(255) NOT NULL,
  `course_view` tinyint(2) NOT NULL,
  `birthday_view` tinyint(2) NOT NULL,
  `gender_view` tinyint(2) NOT NULL,
  `city_view` tinyint(2) NOT NULL,
  `address_view` tinyint(2) NOT NULL,
  `parents_view` tinyint(2) NOT NULL,
  `secret_key` varchar(255) NOT NULL,
  `last_ip` varchar(45) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unique_number` (`enrollment_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `status`, `logn_status`, `parent_id`, `course_id`, `branch_id`, `semester_id`, `enrollment_number`, `first_name`, `last_name`, `userName`, `institute_name`, `follow_teacher_ids`, `qoute`, `email`, `password`, `mobile`, `phone`, `birthday`, `sex`, `fatherName`, `motherName`, `address`, `city`, `state`, `avatar`, `coverImage`, `main_image`, `cover_photo`, `course_view`, `birthday_view`, `gender_view`, `city_view`, `address_view`, `parents_view`, `secret_key`, `last_ip`, `last_login`, `created_at`, `updated_at`, `plan`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'admin', 'Super Admin', '', '', 'admin@tabschool.com', '889a3a791b3875cfae413574b53da4bb8a90d53e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-30 23:52:28', '2017-08-11 18:30:00', NULL, NULL),
(2, 2, 1, 0, 1, 0, 0, 0, NULL, 'Raj', 'Kumar', 'institute', 'Institute', '', '', 'institute@tabschool.com', 'c72e4f3f357b6fd9f32efa51c9d4247a8bef9fde', NULL, '999-999-9999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-08-13 03:12:53', '2017-08-12 05:08:31', NULL, NULL),
(3, 3, 1, 0, 0, 0, 0, 0, NULL, 'Jagdish', 'Kumar', 'teacher', 'Teacher', '', '', 'teacher@tabschool.com', '8635fc4e2a0c7d9d2d9ee40ea8bf2edd76d5757e', NULL, '999-999-9999', '21 December, 1916', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/tabschool/assets/uploads/user_profile/3d788b391357607e331bfb430d176809.png', '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-10-30 01:47:22', '2017-08-11 18:30:00', NULL, NULL),
(4, 4, 1, 0, 1, 0, 0, 0, NULL, 'Manu', 'Kumar', 'student', 'Student', '', '', 'student@tabschool.com', '204036a1ef6e7360e536300ea78c6aeb4a9333dd', NULL, '999-999-9999', NULL, NULL, 'Sohanlal', 'Soni devi', 'MR 10 Road', 'Indore', 'MP', NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-08-13 03:18:50', '2017-08-12 05:08:31', NULL, NULL),
(5, 3, 0, 0, 2, 0, 0, 0, 'ritz', 'Ritesh', 'Carpenter', NULL, 'Ritesh Carpenter', '', '', 'ritesh@gmail.com', 'b571cdc3e1ef9af0663cdbb404bc03c0ce717436', NULL, '9898989899', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-08-11 19:55:28', '2017-08-12 04:30:29', NULL),
(6, 3, 1, 0, 2, 0, 0, 0, 'TEACH1', 'Mangu', 'LAL', NULL, 'Mangu LAL', '', '', 'mangu@gmail.com', '9625d0efc278e671f400217ff1fb652549d1b5f5', NULL, '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-08-12 01:00:15', '2017-08-12 04:29:55', NULL),
(7, 3, 1, 0, 2, 0, 0, 0, 'teach22', 'SIMI', 'Kumar', NULL, 'SIMI Kumar', '', '', 'simi@gmail.com', '31cf11b760356fc4f4c82446370cafd085561f0e', NULL, '9876541230', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-08-12 01:00:15', '2017-08-12 04:30:06', NULL),
(9, 4, 1, 0, 2, 0, 0, 0, 'STD2', 'dsfsdfds', 'sdfsfd', NULL, 'dsfsdfds sdfsfd', '', '', 'fddfgdss@gmail.com', 'b46713df154703b36cb4389015988e374034de60', NULL, '5545454540', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-08-12 14:11:20', '2017-08-12 02:51:51', NULL),
(10, 3, 1, 0, 2, 0, 0, 0, '1421451', 'khushi', 'karpenter', NULL, 'khushi karpenter', '', '', 'khushi1@gmail.com', 'fd7fccea15ebf5f20933fb498e2c2f808e0f955b', NULL, '45124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-08-13 01:27:20', '2017-08-13 01:27:32', NULL),
(30, 2, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'Rockworld', 'Rocking Institute', '', '', 'Rock@gmail.com', 'ab4d8d2a5f480a137067da17100271cd176607a1', '74875475485', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-09-04 04:21:23', '2017-09-03 06:28:58', NULL, 'plan'),
(56, 2, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'Cloudworld', 'Ritesh institute', '', '', 'ritesh@gmail.com', 'ab4d8d2a5f480a137067da17100271cd176607a1', '78475485', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-10-09 21:47:48', '2017-10-09 13:38:34', NULL, 'plan'),
(57, 4, 1, 1, 56, 5, 6, 4, '747774747', 'Ranu', 'madam', NULL, NULL, 'a:2:{i:0;s:2:"59";i:1;s:2:"60";}', '', 'ranu@tester.com', '8cb2237d0679ca88db6464eac60da96345513964', '745774884', NULL, '11/07/2017', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/tabschool/assets/uploads/user_profile/2fa24d22474b7227c2cf1835d61ebdac.png', '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-06 06:14:20', '2017-10-09 01:40:06', NULL, NULL),
(58, 4, 1, 1, 56, 4, 5, 3, '6589548455', 'Rahul', 'siir', NULL, NULL, '', '', 'ritesh123@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '654654', NULL, '11/22/2017', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-05 04:27:58', '2017-10-09 01:40:06', NULL, NULL),
(59, 3, 1, 1, 56, 0, 0, 0, '78484', 'tanya', 'tester', NULL, NULL, '', '', 'tanya@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '7478475', NULL, '04/30/1999', 'female', NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/tabschool/assets/uploads/user_profile/39b594a87c18b54afa5c2a9ef572f416.png', '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-07 00:47:26', '2017-10-09 01:44:13', NULL, NULL),
(60, 3, 1, 1, 56, 0, 0, 0, '45754', 'ravi1', 'tester1', NULL, NULL, '', '', 'tester@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '485454', NULL, '05/19/2010', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/tabschool/assets/uploads/user_profile/48b03449d0bb07c5fd63ef77ab6a2f58.png', '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-18 03:19:50', '2017-10-09 01:44:13', NULL, NULL),
(61, 2, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'Ritesh', 'Mark institute', '', '', 'mark1331@gmail.com', 'ab4d8d2a5f480a137067da17100271cd176607a1', '784754755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-08 04:45:35', '2017-11-08 16:36:48', NULL, 'plan'),
(62, 4, 1, 1, 61, 6, 8, 7, '748547', 'manak', 'Sharma', NULL, NULL, 'a:2:{i:0;s:2:"64";i:1;s:2:"65";}', 'Hey!! Welcome to Tabschool, Tell something about yourself to your friends, colleagues or teachers. If not, write a motto to inspire others..', 'manaksharma@gmail.com', 'e563195894b0f42c245148624e592610e2abf328', '9713316014', NULL, '11/17/2017', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/tabschool/assets/uploads/user_profile/thumb/31542b47a8db26fdde871dc7cf778474.jpg', 'http://localhost/tabschool/assets/uploads/user_profile/31542b47a8db26fdde871dc7cf778474.jpg', 'http://localhost/tabschool/assets/uploads/coverImage/4040d235339f20664f947f0e03a2a62c.jpg', 1, 1, 1, 1, 1, 1, '', '127.0.0.1', '2017-12-03 03:05:07', '2017-11-08 04:44:11', NULL, NULL),
(63, 4, 1, 1, 61, 6, 8, 7, '748548', 'rohit', 'Dham', NULL, NULL, 'a:1:{i:0;s:2:"64";}', '', 'rohit@gmal.com', '8cb2237d0679ca88db6464eac60da96345513964', '85485774', NULL, '01/04/2010', 'male', NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/tabschool/assets/uploads/user_profile/e86c985e0687eae8012ab853f634a647.jpg', '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-08 04:51:07', '2017-11-08 04:44:11', NULL, NULL),
(64, 3, 1, 1, 61, 0, 0, 0, '748547', 'gaurav', 'Sharma', NULL, NULL, '', '', 'gaurav@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '84575485', NULL, '11/10/2017', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-12-01 23:56:21', '2017-11-08 04:44:29', NULL, NULL),
(65, 3, 1, 0, 61, 0, 0, 0, '748548', 'Ranu', 'Dham', NULL, NULL, '', '', 'Ranu@gmal.com', '8cb2237d0679ca88db6464eac60da96345513964', '85485774', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-11-08 04:44:29', NULL, NULL),
(66, 2, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'tabschool', 'Tabschool Computer Institution', '', '', 'support@tabschool.in', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9872485582', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-08 05:11:07', '2017-11-08 17:02:35', NULL, 'plan'),
(67, 4, 1, 1, 66, 7, 9, 8, '1020024', 'Ritesh', 'Kumar', NULL, NULL, 'a:1:{i:0;s:2:"68";}', '', 'abc@abc.com', '8cb2237d0679ca88db6464eac60da96345513964', '9713316014', NULL, '05/11/1994', 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-22 03:51:46', '2017-11-08 05:07:15', NULL, NULL),
(68, 3, 1, 1, 66, 0, 0, 0, '987', 'Sohina', 'Kumar', NULL, NULL, '', '', 'sohina@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '9875462130', NULL, '02/11/1982', 'female', NULL, NULL, NULL, NULL, NULL, NULL, 'http://localhost/tabschool/assets/uploads/user_profile/3199366da0f8005a6c8840e1b2b23cf7.jpg', '', '', 0, 0, 0, 0, 0, 0, '', '127.0.0.1', '2017-11-21 03:29:37', '2017-11-08 05:10:27', NULL, NULL),
(69, 3, 1, 0, 66, 0, 0, 0, '986', 'harsh', 'la', NULL, NULL, '', '', 'harsh@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1234569870', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-11-08 05:10:27', NULL, NULL),
(70, 3, 1, 0, 66, 0, 0, 0, '985', 'akash', 'nu', NULL, NULL, '', '', 'akash@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '4567891230', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-11-08 05:10:27', NULL, NULL),
(71, 3, 1, 0, 66, 0, 0, 0, '984', 'satyam', 'nu', NULL, NULL, '', '', 'satyam@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '2589631470', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, '', NULL, NULL, '2017-11-08 05:10:28', NULL, NULL),
(72, 2, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 'Raja ji', 'Rajkumar Kids zone', '', '', 'raja@gmail.com', 'd677fbfc198d5efda23f42acd71985cf84252f96', '7974911623', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, 0, 0, 0, 0, 0, 'c58RkW', NULL, NULL, '2017-11-19 10:42:19', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
