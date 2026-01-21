<?php
require_once __DIR__ . '/render-publications.php';
?>


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

<?php if ($has_actions): ?>
    <nav class="publication-actions">
        <ul class="publication-actions__menu">
          <?php render_publication_actions($publication, $showPublicationLinks); ?>
        </ul>
    </nav>
<?php endif; ?>
