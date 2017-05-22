-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Ápr 28. 00:32
-- Kiszolgáló verziója: 10.1.10-MariaDB
-- PHP verzió: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `cal`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `academic_program`
--

CREATE TABLE `academic_program` (
  `PROGRAM_TYPE` varchar(5) NOT NULL,
  `ACADEMIC_ADVISOR` varchar(100) DEFAULT NULL,
  `DECLARE_DATE` date DEFAULT NULL,
  `ACAPROG_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `MAJOR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `academic_program_report`
--
CREATE TABLE `academic_program_report` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Program Name` varchar(50)
,`Program Type` varchar(5)
,`Program Declare Date` date
,`Academic Advisor` varchar(100)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `accommodations`
--

CREATE TABLE `accommodations` (
  `ACCOM_ID` int(11) NOT NULL,
  `EXTENDED_TEST_TIME` tinyint(1) DEFAULT NULL,
  `DISTRACTION_REDUCED_ENVIRONMENT` tinyint(1) DEFAULT NULL,
  `COMPUTER_WRITTEN_EXAM` tinyint(1) DEFAULT NULL,
  `CALCULATOR_FOR_EXAM` tinyint(1) DEFAULT NULL,
  `RECORDING_DEVICE_FOR_EXAM` tinyint(1) DEFAULT NULL,
  `NOTE_TAKER` tinyint(1) DEFAULT NULL,
  `ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT` tinyint(1) DEFAULT NULL,
  `CLASS_NOTES` tinyint(1) DEFAULT NULL,
  `COPY_OF_PPT_SLIDES` tinyint(1) DEFAULT NULL,
  `READER_FOR_EXAMS` tinyint(1) DEFAULT NULL,
  `SCRIBE_FOR_EXAMS` tinyint(1) DEFAULT NULL,
  `ADHD` varchar(100) DEFAULT NULL,
  `DISORDER_READING` tinyint(1) DEFAULT NULL,
  `DISORDER_WRITING` tinyint(1) DEFAULT NULL,
  `DISORDER_MATH` tinyint(1) DEFAULT NULL,
  `DISORDER_NONVERBAL` tinyint(1) DEFAULT NULL,
  `DISORDER_SLOW_PROCESSING` tinyint(1) DEFAULT NULL,
  `AUTISM_SPECTRUM_DISORDER` tinyint(1) DEFAULT NULL,
  `OTHER_PSYCH_CONDITIONS` varchar(250) DEFAULT NULL,
  `MEDICATION` tinyint(1) DEFAULT NULL,
  `ACCOM_DATE` date NOT NULL,
  `STUDENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `clinical_record`
--

CREATE TABLE `clinical_record` (
  `CR_ID` int(11) NOT NULL,
  `SUBJECT` varchar(100) DEFAULT NULL,
  `RECORD_DATE` date NOT NULL,
  `TIME_IN` time DEFAULT NULL,
  `TIME_OUT` time DEFAULT NULL,
  `INSTRUCTIONAL_PLAN` varchar(500) DEFAULT NULL,
  `OBSERVED_STRENGTHS` varchar(500) DEFAULT NULL,
  `AREAS_FOR_IMPROVEMENTS` varchar(500) DEFAULT NULL,
  `WHAT_SHOULD_HAPPEN_NEXT` varchar(500) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION1` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION2` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION3` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION4` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION5` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION6` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION7` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_INTERVENTION_OTHER` varchar(250) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES1` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES2` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES3` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES4` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES5` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES6` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES7` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES8` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES9` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES10` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES11` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES12` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES13` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES14` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES15` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES16` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES17` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES18` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES19` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES20` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES21` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES22` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES23` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES24` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES25` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES26` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES27` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES28` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES29` tinyint(1) DEFAULT NULL,
  `INSTRUCTIONAL_OUTCOMES_OTHER` varchar(500) DEFAULT NULL,
  `TUTOR_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `clinical_record_interventions`
--
CREATE TABLE `clinical_record_interventions` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Record Date` date
,`Instructional Intervention #1` tinyint(1)
,`Instructional Intervention #2` tinyint(1)
,`Instructional Intervention #3` tinyint(1)
,`Instructional Intervention #4` tinyint(1)
,`Instructional Intervention #5` tinyint(1)
,`Instructional Intervention #6` tinyint(1)
,`Instructional Intervention #7` tinyint(1)
,`Instructional Intervention Other` varchar(250)
);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `clinical_record_outcomes`
--
CREATE TABLE `clinical_record_outcomes` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Record Date` date
,`Instructional Outcome #1` tinyint(1)
,`Instructional Outcome #2` tinyint(1)
,`Instructional Outcome #3` tinyint(1)
,`Instructional Outcome #4` tinyint(1)
,`Instructional Outcome #5` tinyint(1)
,`Instructional Outcome #6` tinyint(1)
,`Instructional Outcome #7` tinyint(1)
,`Instructional Outcome #8` tinyint(1)
,`Instructional Outcome #9` tinyint(1)
,`Instructional Outcome #10` tinyint(1)
,`Instructional Outcome #11` tinyint(1)
,`Instructional Outcome #12` tinyint(1)
,`Instructional Outcome #13` tinyint(1)
,`Instructional Outcome #14` tinyint(1)
,`Instructional Outcome #15` tinyint(1)
,`Instructional Outcome #16` tinyint(1)
,`Instructional Outcome #17` tinyint(1)
,`Instructional Outcome #18` tinyint(1)
,`Instructional Outcome #19` tinyint(1)
,`Instructional Outcome #20` tinyint(1)
,`Instructional Outcome #21` tinyint(1)
,`Instructional Outcome #22` tinyint(1)
,`Instructional Outcome #23` tinyint(1)
,`Instructional Outcome #24` tinyint(1)
,`Instructional Outcome #25` tinyint(1)
,`Instructional Outcome #26` tinyint(1)
,`Instructional Outcome #27` tinyint(1)
,`Instructional Outcome #28` tinyint(1)
,`Instructional Outcome #29` tinyint(1)
,`Instructional Outcome Other` varchar(500)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `enrollment`
--

CREATE TABLE `enrollment` (
  `ENR_ID` int(11) NOT NULL,
  `SEMESTER_YEAR_ENTERED_BARRY` int(11) NOT NULL,
  `SEMESTER_YEAR_ENTERED_CAL` int(11) NOT NULL,
  `ACCEPTED` tinyint(1) DEFAULT NULL,
  `HIGH_SCHOOL_SUPPORT` tinyint(1) DEFAULT NULL,
  `DATE_LEFT_CAL` date DEFAULT NULL,
  `REASON_LEFT_CAL` varchar(250) DEFAULT NULL,
  `STUDENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `instructional_aids`
--

CREATE TABLE `instructional_aids` (
  `IA_ID` int(11) NOT NULL,
  `SMART_PRESS` tinyint(1) DEFAULT NULL,
  `WWWN_SOFTWARE` tinyint(1) DEFAULT '0',
  `DRAGON_NATURALLY` tinyint(1) DEFAULT NULL,
  `LEARNING_ALLY` tinyint(1) DEFAULT NULL,
  `READING_LAB_TUTOR` tinyint(1) DEFAULT NULL,
  `LINDA_MOOD_BELL` tinyint(1) DEFAULT NULL,
  `IA_DATE` date NOT NULL,
  `STUDENT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `major`
--

CREATE TABLE `major` (
  `MAJOR_ID` int(11) NOT NULL,
  `MAJOR_NAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `majors_report`
--
CREATE TABLE `majors_report` (
`Major ID` int(11)
,`Major Name` varchar(50)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `monthly_clinical_data`
--

CREATE TABLE `monthly_clinical_data` (
  `MCR_ID` int(11) NOT NULL,
  `ABSENCES` int(11) DEFAULT NULL,
  `TARDIES` int(11) DEFAULT NULL,
  `PREP1` tinyint(4) NOT NULL,
  `PREP2` tinyint(4) NOT NULL,
  `PREP3` tinyint(4) NOT NULL,
  `MOTIVATION4` tinyint(4) NOT NULL,
  `MOTIVATION5` tinyint(4) NOT NULL,
  `COMM6` tinyint(4) NOT NULL,
  `COMM7` tinyint(4) NOT NULL,
  `COMMENTS` varchar(200) DEFAULT NULL,
  `MCR_DATE` date NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `TUTOR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` int(11) NOT NULL,
  `STUDENT_LAST_NAME` varchar(50) NOT NULL,
  `STUDENT_FIRST_NAME` varchar(50) NOT NULL,
  `STUDENT_MIDDLE_NAME` varchar(50) DEFAULT NULL,
  `STUDENT_GENDER` varchar(1) DEFAULT NULL,
  `STUDENT_LIVING` varchar(30) DEFAULT NULL,
  `STUDENT_PERM_RESIDENCE` varchar(100) DEFAULT NULL,
  `STUDENT_DATE_OF_BIRTH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `student_accommodation_report`
--
CREATE TABLE `student_accommodation_report` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Extended Test Time` tinyint(1)
,`Distraction Reduced Environment` tinyint(1)
,`Computer Written Exams` tinyint(1)
,`Calculator For Exam` tinyint(1)
,`Recording Device For Exam` tinyint(1)
,`Note Taker` tinyint(1)
,`Extra Time For In-Class Assignment` tinyint(1)
,`Class Notes` tinyint(1)
,`Copy of Powerpoint Slides` tinyint(1)
,`Reader For Exams` tinyint(1)
,`Scribe For Exams` tinyint(1)
,`ADHD` varchar(100)
,`Reading Disorder` tinyint(1)
,`Writing Disorder` tinyint(1)
,`Math Disorder` tinyint(1)
,`Nonverbal Disorder` tinyint(1)
,`Slow Processing Disorder` tinyint(1)
,`Autism Spectrum Disorder` tinyint(1)
,`Other Pyschological Conditions` varchar(250)
,`Medication` tinyint(1)
);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `student_clinical_record_report`
--
CREATE TABLE `student_clinical_record_report` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Tutor Last Name` varchar(50)
,`Subject` varchar(100)
,`Session Date` date
,`Time In` time
,`Time Out` time
,`Instructional Plan` varchar(500)
,`Observed Strengths` varchar(500)
,`Areas For Improvements` varchar(500)
,`What Should Happen Next` varchar(500)
,`Instructional Intervention #1` tinyint(1)
,`Instructional Intervention #2` tinyint(1)
,`Instructional Intervention #3` tinyint(1)
,`Instructional Intervention #4` tinyint(1)
,`Instructional Intervention #5` tinyint(1)
,`Instructional Intervention #6` tinyint(1)
,`Instructional Intervention #7` tinyint(1)
,`Instructional Intervention Other` varchar(250)
,`Instructional Outcome #1` tinyint(1)
,`Instructional Outcome #2` tinyint(1)
,`Instructional Outcome #3` tinyint(1)
,`Instructional Outcome #4` tinyint(1)
,`Instructional Outcome #5` tinyint(1)
,`Instructional Outcome #6` tinyint(1)
,`Instructional Outcome #7` tinyint(1)
,`Instructional Outcome #8` tinyint(1)
,`Instructional Outcome #9` tinyint(1)
,`Instructional Outcome #10` tinyint(1)
,`Instructional Outcome #11` tinyint(1)
,`Instructional Outcome #12` tinyint(1)
,`Instructional Outcome #13` tinyint(1)
,`Instructional Outcome #14` tinyint(1)
,`Instructional Outcome #15` tinyint(1)
,`Instructional Outcome #16` tinyint(1)
,`Instructional Outcome #17` tinyint(1)
,`Instructional Outcome #18` tinyint(1)
,`Instructional Outcome #19` tinyint(1)
,`Instructional Outcome #20` tinyint(1)
,`Instructional Outcome #21` tinyint(1)
,`Instructional Outcome #22` tinyint(1)
,`Instructional Outcome #23` tinyint(1)
,`Instructional Outcome #24` tinyint(1)
,`Instructional Outcome #25` tinyint(1)
,`Instructional Outcome #26` tinyint(1)
,`Instructional Outcome #27` tinyint(1)
,`Instructional Outcome #28` tinyint(1)
,`Instructional Outcome #29` tinyint(1)
,`Instructional Outcome Other` varchar(500)
);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `student_demographic_report`
--
CREATE TABLE `student_demographic_report` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Middle Name` varchar(50)
,`Student Last Name` varchar(50)
,`Date of Birth` date
,`Gender` varchar(1)
,`Living Accommodation` varchar(30)
,`Permanent Residence` varchar(100)
);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `student_enrollment_report`
--
CREATE TABLE `student_enrollment_report` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Semester & Year Student Entered Barry` int(11)
,`Semester & Year Student Entered CAL` int(11)
,`Accepted` tinyint(1)
,`High School Support` tinyint(1)
,`Date Student Left CAL` date
,`Reason Student Left CAL` varchar(250)
);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `student_instructional_aids_report`
--
CREATE TABLE `student_instructional_aids_report` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Smart Pen` tinyint(1)
,`WWWN Software` tinyint(1)
,`Dragon Naturally` tinyint(1)
,`Learning Ally` tinyint(1)
,`Reading Lab Tutor` tinyint(1)
,`Linda Mood Bell` tinyint(1)
);

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `student_monthly_clinical_data_report`
--
CREATE TABLE `student_monthly_clinical_data_report` (
`Student ID Number` int(11)
,`Student First Name` varchar(50)
,`Student Last Name` varchar(50)
,`Total Absences` int(11)
,`Total Tardies` int(11)
,`Preparation #1` tinyint(4)
,`Preparation #2` tinyint(4)
,`Preparation #3` tinyint(4)
,`Motivation #1` tinyint(4)
,`Motivation #2` tinyint(4)
,`Communication #1` tinyint(4)
,`Communication #2` tinyint(4)
,`Comments` varchar(200)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tutor`
--

CREATE TABLE `tutor` (
  `TUTOR_ID` int(11) NOT NULL,
  `TUTOR_LAST_NAME` varchar(50) NOT NULL,
  `TUTOR_FIRST_NAME` varchar(50) NOT NULL,
  `TUTOR_DATE_STARTED_CAL` date NOT NULL,
  `TUTOR_DATE_LEFT_CAL` date DEFAULT NULL,
  `TUTOR_SUBJECT_AREA` varchar(100) NOT NULL,
  `TUTOR_DEGREE` varchar(100) DEFAULT NULL,
  `TUTOR_CONTACT_NUMBER` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `tutor_information_report`
--
CREATE TABLE `tutor_information_report` (
`Tutor ID Number` int(11)
,`Tutor First Name` varchar(50)
,`Tutor Last Name` varchar(50)
,`Tutor Email` varchar(100)
,`Subject Area` varchar(100)
,`Date Started CAL` date
,`Date Left CAL` date
,`Tutor Contact Information` varchar(50)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USER_EMAIL` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(100) NOT NULL,
  `ISADMIN` tinyint(1) NOT NULL,
  `TUTOR_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Nézet szerkezete `academic_program_report`
--
DROP TABLE IF EXISTS `academic_program_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `academic_program_report`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`major`.`MAJOR_NAME` AS `Program Name`,`academic_program`.`PROGRAM_TYPE` AS `Program Type`,`academic_program`.`DECLARE_DATE` AS `Program Declare Date`,`academic_program`.`ACADEMIC_ADVISOR` AS `Academic Advisor` from ((`student` join `academic_program` on((`student`.`STUDENT_ID` = `academic_program`.`STUDENT_ID`))) join `major` on((`academic_program`.`MAJOR_ID` = `major`.`MAJOR_ID`))) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `clinical_record_interventions`
--
DROP TABLE IF EXISTS `clinical_record_interventions`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `clinical_record_interventions`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`clinical_record`.`RECORD_DATE` AS `Record Date`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION1` AS `Instructional Intervention #1`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION2` AS `Instructional Intervention #2`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION3` AS `Instructional Intervention #3`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION4` AS `Instructional Intervention #4`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION5` AS `Instructional Intervention #5`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION6` AS `Instructional Intervention #6`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION7` AS `Instructional Intervention #7`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION_OTHER` AS `Instructional Intervention Other` from (`student` left join `clinical_record` on((`student`.`STUDENT_ID` = `clinical_record`.`STUDENT_ID`))) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `clinical_record_outcomes`
--
DROP TABLE IF EXISTS `clinical_record_outcomes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `clinical_record_outcomes`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`clinical_record`.`RECORD_DATE` AS `Record Date`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES1` AS `Instructional Outcome #1`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES2` AS `Instructional Outcome #2`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES3` AS `Instructional Outcome #3`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES4` AS `Instructional Outcome #4`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES5` AS `Instructional Outcome #5`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES6` AS `Instructional Outcome #6`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES7` AS `Instructional Outcome #7`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES8` AS `Instructional Outcome #8`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES9` AS `Instructional Outcome #9`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES10` AS `Instructional Outcome #10`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES11` AS `Instructional Outcome #11`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES12` AS `Instructional Outcome #12`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES13` AS `Instructional Outcome #13`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES14` AS `Instructional Outcome #14`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES15` AS `Instructional Outcome #15`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES16` AS `Instructional Outcome #16`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES17` AS `Instructional Outcome #17`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES18` AS `Instructional Outcome #18`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES19` AS `Instructional Outcome #19`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES20` AS `Instructional Outcome #20`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES21` AS `Instructional Outcome #21`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES22` AS `Instructional Outcome #22`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES23` AS `Instructional Outcome #23`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES24` AS `Instructional Outcome #24`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES25` AS `Instructional Outcome #25`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES26` AS `Instructional Outcome #26`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES27` AS `Instructional Outcome #27`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES28` AS `Instructional Outcome #28`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES29` AS `Instructional Outcome #29`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES_OTHER` AS `Instructional Outcome Other` from (`student` left join `clinical_record` on((`student`.`STUDENT_ID` = `clinical_record`.`STUDENT_ID`))) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `majors_report`
--
DROP TABLE IF EXISTS `majors_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `majors_report`  AS  select `major`.`MAJOR_ID` AS `Major ID`,`major`.`MAJOR_NAME` AS `Major Name` from `major` ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `student_accommodation_report`
--
DROP TABLE IF EXISTS `student_accommodation_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `student_accommodation_report`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`accommodations`.`EXTENDED_TEST_TIME` AS `Extended Test Time`,`accommodations`.`DISTRACTION_REDUCED_ENVIRONMENT` AS `Distraction Reduced Environment`,`accommodations`.`COMPUTER_WRITTEN_EXAM` AS `Computer Written Exams`,`accommodations`.`CALCULATOR_FOR_EXAM` AS `Calculator For Exam`,`accommodations`.`RECORDING_DEVICE_FOR_EXAM` AS `Recording Device For Exam`,`accommodations`.`NOTE_TAKER` AS `Note Taker`,`accommodations`.`ADDITIONAL_TIME_FOR_IN_CLASS_ASSIGNMENT` AS `Extra Time For In-Class Assignment`,`accommodations`.`CLASS_NOTES` AS `Class Notes`,`accommodations`.`COPY_OF_PPT_SLIDES` AS `Copy of Powerpoint Slides`,`accommodations`.`READER_FOR_EXAMS` AS `Reader For Exams`,`accommodations`.`SCRIBE_FOR_EXAMS` AS `Scribe For Exams`,`accommodations`.`ADHD` AS `ADHD`,`accommodations`.`DISORDER_READING` AS `Reading Disorder`,`accommodations`.`DISORDER_WRITING` AS `Writing Disorder`,`accommodations`.`DISORDER_MATH` AS `Math Disorder`,`accommodations`.`DISORDER_NONVERBAL` AS `Nonverbal Disorder`,`accommodations`.`DISORDER_SLOW_PROCESSING` AS `Slow Processing Disorder`,`accommodations`.`AUTISM_SPECTRUM_DISORDER` AS `Autism Spectrum Disorder`,`accommodations`.`OTHER_PSYCH_CONDITIONS` AS `Other Pyschological Conditions`,`accommodations`.`MEDICATION` AS `Medication` from (`student` join `accommodations` on((`student`.`STUDENT_ID` = `accommodations`.`STUDENT_ID`))) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `student_clinical_record_report`
--
DROP TABLE IF EXISTS `student_clinical_record_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `student_clinical_record_report`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`tutor`.`TUTOR_LAST_NAME` AS `Tutor Last Name`,`clinical_record`.`SUBJECT` AS `Subject`,`clinical_record`.`RECORD_DATE` AS `Session Date`,`clinical_record`.`TIME_IN` AS `Time In`,`clinical_record`.`TIME_OUT` AS `Time Out`,`clinical_record`.`INSTRUCTIONAL_PLAN` AS `Instructional Plan`,`clinical_record`.`OBSERVED_STRENGTHS` AS `Observed Strengths`,`clinical_record`.`AREAS_FOR_IMPROVEMENTS` AS `Areas For Improvements`,`clinical_record`.`WHAT_SHOULD_HAPPEN_NEXT` AS `What Should Happen Next`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION1` AS `Instructional Intervention #1`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION2` AS `Instructional Intervention #2`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION3` AS `Instructional Intervention #3`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION4` AS `Instructional Intervention #4`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION5` AS `Instructional Intervention #5`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION6` AS `Instructional Intervention #6`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION7` AS `Instructional Intervention #7`,`clinical_record`.`INSTRUCTIONAL_INTERVENTION_OTHER` AS `Instructional Intervention Other`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES1` AS `Instructional Outcome #1`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES2` AS `Instructional Outcome #2`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES3` AS `Instructional Outcome #3`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES4` AS `Instructional Outcome #4`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES5` AS `Instructional Outcome #5`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES6` AS `Instructional Outcome #6`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES7` AS `Instructional Outcome #7`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES8` AS `Instructional Outcome #8`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES9` AS `Instructional Outcome #9`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES10` AS `Instructional Outcome #10`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES11` AS `Instructional Outcome #11`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES12` AS `Instructional Outcome #12`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES13` AS `Instructional Outcome #13`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES14` AS `Instructional Outcome #14`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES15` AS `Instructional Outcome #15`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES16` AS `Instructional Outcome #16`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES17` AS `Instructional Outcome #17`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES18` AS `Instructional Outcome #18`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES19` AS `Instructional Outcome #19`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES20` AS `Instructional Outcome #20`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES21` AS `Instructional Outcome #21`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES22` AS `Instructional Outcome #22`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES23` AS `Instructional Outcome #23`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES24` AS `Instructional Outcome #24`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES25` AS `Instructional Outcome #25`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES26` AS `Instructional Outcome #26`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES27` AS `Instructional Outcome #27`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES28` AS `Instructional Outcome #28`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES29` AS `Instructional Outcome #29`,`clinical_record`.`INSTRUCTIONAL_OUTCOMES_OTHER` AS `Instructional Outcome Other` from ((`clinical_record` join `student`) join `tutor`) where ((`clinical_record`.`STUDENT_ID` = `student`.`STUDENT_ID`) and (`clinical_record`.`TUTOR_ID` = `tutor`.`TUTOR_ID`)) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `student_demographic_report`
--
DROP TABLE IF EXISTS `student_demographic_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `student_demographic_report`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_MIDDLE_NAME` AS `Student Middle Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`student`.`STUDENT_DATE_OF_BIRTH` AS `Date of Birth`,`student`.`STUDENT_GENDER` AS `Gender`,`student`.`STUDENT_LIVING` AS `Living Accommodation`,`student`.`STUDENT_PERM_RESIDENCE` AS `Permanent Residence` from `student` ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `student_enrollment_report`
--
DROP TABLE IF EXISTS `student_enrollment_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `student_enrollment_report`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`enrollment`.`SEMESTER_YEAR_ENTERED_BARRY` AS `Semester & Year Student Entered Barry`,`enrollment`.`SEMESTER_YEAR_ENTERED_CAL` AS `Semester & Year Student Entered CAL`,`enrollment`.`ACCEPTED` AS `Accepted`,`enrollment`.`HIGH_SCHOOL_SUPPORT` AS `High School Support`,`enrollment`.`DATE_LEFT_CAL` AS `Date Student Left CAL`,`enrollment`.`REASON_LEFT_CAL` AS `Reason Student Left CAL` from (`student` join `enrollment` on((`student`.`STUDENT_ID` = `enrollment`.`STUDENT_ID`))) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `student_instructional_aids_report`
--
DROP TABLE IF EXISTS `student_instructional_aids_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `student_instructional_aids_report`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`instructional_aids`.`SMART_PRESS` AS `Smart Pen`,`instructional_aids`.`WWWN_SOFTWARE` AS `WWWN Software`,`instructional_aids`.`DRAGON_NATURALLY` AS `Dragon Naturally`,`instructional_aids`.`LEARNING_ALLY` AS `Learning Ally`,`instructional_aids`.`READING_LAB_TUTOR` AS `Reading Lab Tutor`,`instructional_aids`.`LINDA_MOOD_BELL` AS `Linda Mood Bell` from ((`student` left join `enrollment` on((`student`.`STUDENT_ID` = `enrollment`.`STUDENT_ID`))) join `instructional_aids` on((`student`.`STUDENT_ID` = `instructional_aids`.`STUDENT_ID`))) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `student_monthly_clinical_data_report`
--
DROP TABLE IF EXISTS `student_monthly_clinical_data_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `student_monthly_clinical_data_report`  AS  select `student`.`STUDENT_ID` AS `Student ID Number`,`student`.`STUDENT_FIRST_NAME` AS `Student First Name`,`student`.`STUDENT_LAST_NAME` AS `Student Last Name`,`monthly_clinical_data`.`ABSENCES` AS `Total Absences`,`monthly_clinical_data`.`TARDIES` AS `Total Tardies`,`monthly_clinical_data`.`PREP1` AS `Preparation #1`,`monthly_clinical_data`.`PREP2` AS `Preparation #2`,`monthly_clinical_data`.`PREP3` AS `Preparation #3`,`monthly_clinical_data`.`MOTIVATION4` AS `Motivation #1`,`monthly_clinical_data`.`MOTIVATION5` AS `Motivation #2`,`monthly_clinical_data`.`COMM6` AS `Communication #1`,`monthly_clinical_data`.`COMM7` AS `Communication #2`,`monthly_clinical_data`.`COMMENTS` AS `Comments` from (`student` left join `monthly_clinical_data` on((`student`.`STUDENT_ID` = `monthly_clinical_data`.`STUDENT_ID`))) ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `tutor_information_report`
--
DROP TABLE IF EXISTS `tutor_information_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`cal`@`localhost` SQL SECURITY DEFINER VIEW `tutor_information_report`  AS  select `tutor`.`TUTOR_ID` AS `Tutor ID Number`,`tutor`.`TUTOR_FIRST_NAME` AS `Tutor First Name`,`tutor`.`TUTOR_LAST_NAME` AS `Tutor Last Name`,`users`.`USER_EMAIL` AS `Tutor Email`,`tutor`.`TUTOR_SUBJECT_AREA` AS `Subject Area`,`tutor`.`TUTOR_DATE_STARTED_CAL` AS `Date Started CAL`,`tutor`.`TUTOR_DATE_LEFT_CAL` AS `Date Left CAL`,`tutor`.`TUTOR_CONTACT_NUMBER` AS `Tutor Contact Information` from (`tutor` left join `users` on((`tutor`.`TUTOR_ID` = `users`.`TUTOR_ID`))) ;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `academic_program`
--
ALTER TABLE `academic_program`
  ADD PRIMARY KEY (`ACAPROG_ID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`),
  ADD KEY `MAJOR_ID` (`MAJOR_ID`);

--
-- A tábla indexei `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`ACCOM_ID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`);

--
-- A tábla indexei `clinical_record`
--
ALTER TABLE `clinical_record`
  ADD PRIMARY KEY (`CR_ID`),
  ADD KEY `TUTOR_ID` (`TUTOR_ID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`);

--
-- A tábla indexei `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`ENR_ID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`);

--
-- A tábla indexei `instructional_aids`
--
ALTER TABLE `instructional_aids`
  ADD PRIMARY KEY (`IA_ID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`);

--
-- A tábla indexei `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`MAJOR_ID`);

--
-- A tábla indexei `monthly_clinical_data`
--
ALTER TABLE `monthly_clinical_data`
  ADD PRIMARY KEY (`MCR_ID`),
  ADD KEY `STUDENT_ID` (`STUDENT_ID`),
  ADD KEY `TUTOR_ID` (`TUTOR_ID`);

--
-- A tábla indexei `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- A tábla indexei `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`TUTOR_ID`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USER_EMAIL` (`USER_EMAIL`),
  ADD UNIQUE KEY `TUTOR_ID` (`TUTOR_ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `academic_program`
--
ALTER TABLE `academic_program`
  MODIFY `ACAPROG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT a táblához `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `ACCOM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT a táblához `clinical_record`
--
ALTER TABLE `clinical_record`
  MODIFY `CR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;
--
-- AUTO_INCREMENT a táblához `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `ENR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT a táblához `instructional_aids`
--
ALTER TABLE `instructional_aids`
  MODIFY `IA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT a táblához `major`
--
ALTER TABLE `major`
  MODIFY `MAJOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT a táblához `monthly_clinical_data`
--
ALTER TABLE `monthly_clinical_data`
  MODIFY `MCR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `academic_program`
--
ALTER TABLE `academic_program`
  ADD CONSTRAINT `academic_program_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `academic_program_ibfk_2` FOREIGN KEY (`MAJOR_ID`) REFERENCES `major` (`MAJOR_ID`);

--
-- Megkötések a táblához `accommodations`
--
ALTER TABLE `accommodations`
  ADD CONSTRAINT `accommodations_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `clinical_record`
--
ALTER TABLE `clinical_record`
  ADD CONSTRAINT `clinical_record_ibfk_1` FOREIGN KEY (`TUTOR_ID`) REFERENCES `tutor` (`TUTOR_ID`),
  ADD CONSTRAINT `clinical_record_ibfk_2` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `instructional_aids`
--
ALTER TABLE `instructional_aids`
  ADD CONSTRAINT `instructional_aids_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `monthly_clinical_data`
--
ALTER TABLE `monthly_clinical_data`
  ADD CONSTRAINT `monthly_clinical_data_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monthly_clinical_data_ibfk_2` FOREIGN KEY (`TUTOR_ID`) REFERENCES `tutor` (`TUTOR_ID`);

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`TUTOR_ID`) REFERENCES `tutor` (`TUTOR_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
