<?php
/**
 * See horde/config/prefs.php for documentation on the structure of this file.
 *
 * IMPORTANT: Local overrides should be placed in prefs.local.php, or
 * prefs-servername.php if the 'vhosts' setting has been enabled in Horde's
 * configuration.
 */

if ($GLOBALS['conf']['avatar']['allow_avatars']) {
    $prefGroups['display_avatar'] = array(
        'column' => _("My Information"),
        'label' => _("Avatar"),
        'desc' => _("Set the avatar image that is shown with your posts."),
        'members' => array('avatar_path', 'avatar_link')
    );
}

$prefGroups['display_forums'] = array(
    'column' => _("Display Preferences"),
    'label' => _("Forums View"),
    'desc' => _("Set your preferences for the forums view."),
    'members' => array('forums_sortby', 'forums_sortdir', 'forums_per_page')
);

$prefGroups['display_threads'] = array(
    'column' => _("Display Preferences"),
    'label' => _("Threads View"),
    'desc' => _("Set your preferences for the threads view."),
    'members' => array(
        'threads_sortby', 'threads_sortdir', 'threads_hot',
        'threads_per_page'
    )
);

$prefGroups['display_thread'] = array(
    'column' => _("Display Preferences"),
    'label' => _("Single Thread View"),
    'desc' => _("Set your preferences for the single thread view."),
    'members' => array(
        'thread_sortby', 'thread_sortdir', 'thread_view_bodies',
        'thread_per_page'
    )
);

$prefGroups['display_message'] = array(
    'column' => _("Display Preferences"),
    'label' => _("Message View"),
    'desc' => _("Set your preferences for the message view."),
    'members' => array('message_emoticons')
);

$prefGroups['display_comments'] = array(
    'column' => _("Display Preferences"),
    'label' => _("Comments view"),
    'desc' => _("Set your preferences for the single thread view."),
    'members' => array(
        'comments_sortby', 'comments_sortdir', 'comments_view_bodies',
        'comments_per_page'
    )
);

/* Avatar */

$_prefs['avatar_path'] = array(
    'value' => '',
    'type' => 'text',
    'desc' => _("The location of your avatar image.")
);
if ($GLOBALS['conf']['avatar']['allow_avatars'] &&
   $GLOBALS['conf']['avatar']['enable_image_tests']) {
    $_prefs['avatar_path']['desc'] .= ' ' . sprintf(_("Avatars must be smaller than %s by %s pixels and less than %sKb in size."),
                    $GLOBALS['conf']['avatar']['max_width'],
                    $GLOBALS['conf']['avatar']['max_height'],
                    $GLOBALS['conf']['avatar']['max_size']);
}

$_prefs['avatar_link'] = array(
    'type' => 'rawhtml',
    'url' => '<p>' . _("Choose from a gallery of avatars:") . ' <input class="button" type="button" value="' . _("Click to Show Gallery") . '" onclick="' . Horde::popupJs(Horde::url('avatars/gallery.php'), array('height' => 320, 'width' => 320)) . '" /></p>'
);

/* Forums */

$_prefs['forums_sortby'] = array(
    'value' => 'forum_name',
    'type' => 'enum',
    'enum' => array(
        'forum_name' => _("Forum"),
        'message_count' => _("Messages"),
        'message_subject' => _("Last Message"),
        'message_author' => _("Posted by"),
        'message_date' => _("Date")
    ),
    'desc' => _("Default forums view sort:")
);

$_prefs['forums_sortdir'] = array(
    'value' => 0,
    'type' => 'enum',
    'enum' => array(
        0 => _("Ascending"),
        1 => _("Descending")
    ),
    'desc' => _("Default sorting direction:")
);

$_prefs['forums_per_page'] = array(
    'value' => 20,
    'type' => 'enum',
    'enum' => array(
        5 => 5,
        10 => 10,
        15 => 15,
        20 => 20,
        25 => 25
    ),
    'desc' => _("Number of forums to display on each page")
);

/* Threads */

$_prefs['threads_sortby'] = array(
    'value' => 'message_modifystamp',
    'type' => 'enum',
    'enum' => array(
        'message_thread' => _("Thread"),
        'message_subject' => _("Subject"),
        'message_author' => _("Posted by"),
        'message_seq' => _("Posts"),
        'message_timestamp' => _("Date"),
        'message_modifystamp' => _("Last post")
    ),
    'desc' => _("Default threads view sort:")
);

$_prefs['threads_sortdir'] = array(
    'value' => 1,
    'type' => 'enum',
    'enum' => array(
        0 => _("Ascending"),
        1 => _("Descending")
   ),
    'desc' => _("Default sorting direction:")
);

$_prefs['threads_hot'] = array(
    'value' => 20,
    'type' => 'number',
    'desc' => _("Number of views in 24hrs to trigger a 'hot-thread':")
);

$_prefs['threads_per_page'] = array(
    'value' => 10,
    'type' => 'enum',
    'enum' => array(
        5 => 5,
        10 => 10,
        15 => 15,
        20 => 20,
        25 => 25
    ),
    'desc' => _("Number of messages to display on each page")
);

/* Thread */

$_prefs['thread_sortby'] = array(
    'value' => 'message_timestamp',
    'type' => 'enum',
    'enum' => array(
        'message_thread' => _("Thread"),
        'message_subject' => _("Subject"),
        'message_author' => _("Posted by"),
        'message_timestamp' => _("Date")
    ),
    'desc' => _("Default thread view sort:")
);

$_prefs['thread_sortdir'] = array(
    'value' => 0,
    'type' => 'enum',
    'enum' => array(
        0 => _("Ascending"),
        1 => _("Descending")
    ),
    'desc' => _("Default sorting direction:")
);

$_prefs['thread_view_bodies'] = array(
    'value' => 0,
    'type' => 'enum',
    'enum' => array(
        0 => _("No"),
        1 => _("Yes"),
        2 => _("Yes, and don't thread them")
    ),
    'desc' => _("Display full message bodies in the thread list view?")
);

$_prefs['thread_per_page'] = array(
    'value' => 10,
    'type' => 'enum',
    'enum' => array(
        5 => 5,
        10 => 10,
        15 => 15,
        20 => 20,
        25 => 25
    ),
    'desc' => _("Number of message to display on each page")
);

$_prefs['message_emoticons'] = array(
    'value' => 1,
    'type' => 'enum',
    'enum' => array(
        0 => _("No graphical emoticons"),
        1 => _("Show graphical emoticons")
   ),
    'desc' => _("Display graphical emoticons?")
);

$_prefs['forums_block_display'] = array(
    'value' => 0
);

$_prefs['threads_block_display'] = array(
    'value' => 0
);

$_prefs['moderate_sortby'] = array(
    'value' => 'message_id'
);

$_prefs['moderate_sortdir'] = array(
    'value' => 0
);


/* Comments */

$_prefs['comments_view_bodies'] = array(
    'value' => 2,
    'type' => 'enum',
    'enum' => array(
        2 => _("Flat"),
        1 => _("Thread")
    ),
    'desc' => _("Display full message bodies in the comments view?")
);

$_prefs['comments_sortby'] = array(
    'value' => 'message_timestamp',
    'type' => 'enum',
    'enum' => array(
        'message_subject' => _("Subject"),
        'message_author' => _("Posted by"),
        'message_timestamp' => _("Date")
    ),
    'desc' => _("Default comments view sort:")
);

$_prefs['comments_sortdir'] = array(
    'value' => 1,
    'type' => 'enum',
    'enum' => array(
        0 => _("Ascending"),
        1 => _("Descending")
    ),
    'desc' => _("Default sorting direction:")
);

$_prefs['comments_per_page'] = array(
    'value' => 20,
    'type' => 'enum',
    'enum' => array(
        5 => 5,
        10 => 10,
        15 => 15,
        20 => 20,
        25 => 25
    ),
    'desc' => _("Number of messages to display on each page")
);

/* Local overrides. */
if (file_exists(dirname(__FILE__) . '/prefs.local.php')) {
    include dirname(__FILE__) . '/prefs.local.php';
}