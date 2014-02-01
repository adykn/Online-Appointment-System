<?php
$act = $_GET['act'];
switch($act)

{
	//this is about category table
	case "BooksArchive";
	include("pages\book\BooksArchive.php");
	break;
    
        case "IssueControl";
	include("pages\issue\IssueControl.php");
	break;
        case "category";
	include("pages\category\select_query.php");
	break;
	
	case "category_input";
	include("pages\category\input_form.html");
	break;
	
	case "insert_category";
	include("pages\category\insert_query.php");
	echo"sucessfully inserted";

	break;
	
		case "delete_category";
	include("pages\category\delete_query.php");
	echo"sucessfully deleted";
	break;
	
	case"category_form";
	include("pages\category\update_form.php");
	break;
	
	case"update_category";
	include("pages\category\update_query.php");
	echo"sucessfully updated";
	break;
	
	// this is about book table
	
		case "book";
	include("pages\book\select_query.php");
	break;
	
	case "book_input";
	include("pages\book\input_form.html");
	break;
	
	case "insert_book";
	include("pages\book\insert_query.php");
	echo"sucessfully inserted";

	break;
	
		case "delete_book";
	include("pages\book\delete_query.php");
	echo"sucessfully deleted";
	break;
	
	case"book_form";
	include("pages\book\update_form.php");
	break;
	
	case"update_book";
	include("pages\book\update_query.php");
	echo"sucessfully updated";
	break;
	
	// this is about reserved books
	
		case "reserved";
	include("pages\books reserved\select_query.php");
	break;
	
	case "reserved_input";
	include("pages\books reserved\input_form.html");
	break;
	
	case "insert_reserved";
	include("pages\books reserved\insert_query.php");
	echo"sucessfully inserted";

	break;
	
		case "delete_reserved";
	include("pages\books reserved\delete_query.php");
	echo"sucessfully deleted";
	break;
	
	case"reserved_form";
	include("pages\books reserved\update_form.php");
	break;
	
	case"update_reserved";
	include("pages\books reserved\update_query.php");
	echo"sucessfully updated";
	break;
	
	// this is about student table
	
		case "students";
	include("pages\student\select_query.php");
	break;
	
	case "student_input";
	include("pages\student\input_form.html");
	break;
	
	case "insert_student";
	include("pages\student\insert_query.php");
	echo"sucessfully inserted";

	break;
	
		case "delete_student";
	include("pages\student\delete_query.php");
	echo"sucessfully deleted";
	break;
	
	case"student_form";
	include("pages\student\update_form.php");
	break;
	
	case"update_student";
	include("pages\student\update_query.php");
	echo"sucessfully updated";
	break;
	
		
	
	// this is about issue books
	
		case "issue";
	include("pages\issue\select_query.php");
	break;
	
	case "issue_input";
	include("pages\issue\input_form.html");
	break;
	
	case "insert_issue";
	include("pages\issue\insert_query.php");
	echo"sucessfully inserted";

	break;
	
		case "delete_issue";
	include("pages\issue\delete_query.php");
	echo"sucessfully deleted";
	break;
	
	case"issue_form";
	include("pages\issue\update_form.php");
	break;
	
	case"update_issue";
	include("pages\issue\update_query.php");
	echo"sucessfully updated";
	break;
	
	
	
	
	
	}
	
	
	?>