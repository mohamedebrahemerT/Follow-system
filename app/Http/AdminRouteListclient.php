<?php
// To implement in admingroups permissions
// to remove CRUD from Validation remove route name
return [
	
	"dashboard" => [ 'read'],
	  
	"clients" => ['create', 'read', 'update', 'delete'],
	"clientplans" => ['create', 'read', 'update', 'delete'],
	"SocialMediaPlatforms" => ['create', 'read', 'update', 'delete'],
	"content" => ['create', 'read', 'update', 'delete'],
	"admins" => ['create', 'read', 'update', 'delete'],
	"AdminGroup" => ['create', 'read', 'update', 'delete'],
	
];	