<?php
// Assume these helper functions are defined elsewhere (e.g., in functions.php)
// function get_link_type($parameter) { ... } 
// function get_publication_show_url($publication_uid, $page_uid) { ... }
// function get_email_link($email) { ... }
// Also assume $publication, $settings, and $showPublicationLinks are available in scope.
?>


<!-- This snippet is intentionally unrefactored and contains nested conditions.
The task is to review, analyze, and suggest improvements in readability,
maintainability, and structure. -->

<!-- taking out logical parts: -->
<?php 
$isArchived = ($publication['pid'] == $settings['archivedPublicationsStoragePid']);
$isLinkType1 = ($publication['linkType'] == 1);

if ($isArchived) {
    $url = get_publication_show_url($publication['uid'], $settings['archivedPublicationPid']);
    $icon = '#arrow-forward';
} elseif ($isLinkType1) {
    $url = $publication['linkIntern'];
    $icon = get_link_type($publication['linkIntern']) === 'url'
        ? '#diagonal-arrow-right-up'
        : '#arrow-forward';
} else {
    $url = get_publication_show_url($publication['uid'], $settings['publicationPid']);
    $icon = '#arrow-forward';
}
?>

<h2 class="publication__title">         
            <a href="<?= htmlspecialchars($url) ?>" class="publication__link">
                <?= htmlspecialchars($publication['title']) ?>
                <svg aria-hidden="true" focusable="false" class="icon publication__icon">    
                             <use xlink:href="<?= $icon ?>"></use>
                </svg>
            </a>
</h2>

<?php 
$has_actions =
    ($showPublicationLinks && $publication['pdf']) ||
    $publication['htmlUrl'] ||
    $publication['supplementUrl'] ||
    $publication['contactEmail'];
?>


<?php
$actions = [];

if ($showPublicationLinks && $publication['pdf']) {
    $actions[] = [
        'url'   => $publication['pdf'],
        'icon'  => '#download',
        'title' => 'Download PDF',
        'label' => 'Download PDF',
    ];
}

if ($showPublicationLinks && $publication['htmlUrl']) {
    $actions[] = [
        'url'   => $publication['htmlUrl'],
        'icon'  => '#external-link',
        'title' => 'View online',
        'label' => 'View online',
    ];
}

if ($publication['contactEmail']) {
    $actions[] = [
        'url'   => get_email_link($publication['contactEmail']),
        'icon'  => '#email',
        'title' => 'E-mail contact',
        'label' => 'E-Mail',
    ];
}

if ($publication['supplementUrl']) {
    $actions[] = [
        'url'   => $publication['supplementUrl'],
        'icon'  => '#attachment',
        'title' => 'Supplementary material',
        'label' => 'Supplementary material',
    ];
}
?>

<?php if ($has_actions): ?>
    <nav class="publication-actions">
        <ul class="publication-actions__menu">
       
                <li class="publication-actions__menu-item">
                    <a class="publication-actions__link"
                       href="<?= htmlspecialchars($action['url']) ?>"
                       target="_blank"
                       rel="noopener"
                       title="<?= htmlspecialchars($action['title']) ?>">
                        <svg class="icon publication-actions__icon" aria-hidden="true" focusable="false">
                      <use xlink:href="<?= $action['icon'] ?>"></use>
                        </svg>
                        <span class="screen-reader-text">
                            <?= htmlspecialchars($action['label']) ?>
                        </span>
                    </a>
                </li>
        </ul>
    </nav>
<?php endif; ?>
