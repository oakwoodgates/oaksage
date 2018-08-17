<?php
if ( is_archive() ) {
	echo App\Template('archive-product');
} else {
	echo App\Template('single-product');
}