<?php
/**
 * The template file for displaying the comments and comment form for the
 * atakanoz theme.
 *
 * @package themekit
 *
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/

if ( post_password_required() || ( ! have_comments() && ! comments_open() ) ) {
	return;
}
