  <?php
	interface Controller
	{
		function __construct();

		function render();
		function getTitle();
		function getDescription();
		function getH1();
		function useLayout();
		function getBreadCrumbs();
	}