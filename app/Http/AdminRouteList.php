<?php
// To implement in admingroups permissions
// to remove CRUD from Validation remove route name
return [
	
	"dashboard" => [ 'read'],
	 
	"admins" => ['create', 'read', 'update', 'delete'],
	"AdminGroup" => ['create', 'read', 'update', 'delete'],
	
];	