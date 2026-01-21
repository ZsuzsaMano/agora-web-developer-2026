<?php
/**
 * Renders publication actions (PDF, HTML, Email, Supplement)
 */

function render_publication_actions(array $publication, bool $showPublicationLinks): void
{
    // PDF
    if ($showPublicationLinks && $publication['pdf']) {
        $url   = $publication['pdf'];
        $icon  = '#download';
        $title = 'Download PDF';
        $label = 'Download PDF';

        include __DIR__ . '/action-item.php';
    }

    // HTML
    if ($showPublicationLinks && $publication['htmlUrl']) {
        $url   = $publication['htmlUrl'];
        $icon  = '#external-link';
        $title = 'View online';
        $label = 'View online';

        include __DIR__ . '/action-item.php';
    }

    // Contact Email
    if ($publication['contactEmail']) {
        $url   = get_email_link($publication['contactEmail']);
        $icon  = '#email';
        $title = 'E-mail contact';
        $label = 'E-Mail';

        include __DIR__ . '/action-item.php';
    }

    // Supplement
    if ($publication['supplementUrl']) {
        $url   = $publication['supplementUrl'];
        $icon  = '#attachment';
        $title = 'Supplementary material';
        $label = 'Supplementary material';

        include __DIR__ . '/action-item.php';
    }
}
