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


<h2 class="publication__title">
    <?php if ($publication['pid'] != $settings['archivedPublicationsStoragePid']): ?>
        
        <?php if ($publication['linkType'] == 1): ?>
            
            <a href="<?= htmlspecialchars($publication['linkIntern']) ?>" class="publication__link">
                <?= htmlspecialchars($publication['title']) ?>
                <svg aria-hidden="true" focusable="false" class="icon publication__icon">
                    <?php if (get_link_type($publication['linkIntern']) == 'url'): ?>
                        <use xlink:href="#diagonal-arrow-right-up"></use>
                    <?php else: ?>
                        <use xlink:href="#arrow-forward"></use>
                    <?php endif; ?>
                </svg>
            </a>
        <?php else: ?>
            
            <a href="<?= htmlspecialchars(get_publication_show_url($publication['uid'], $settings['publicationPid'])) ?>" class="publication__link">
                <?= htmlspecialchars($publication['title']) ?>
                <svg aria-hidden="true" focusable="false" class="icon publication__icon">
                    <use xlink:href="#arrow-forward"></use>
                </svg>
            </a>
        <?php endif; ?>
    <?php else: ?>
        
        <a href="<?= htmlspecialchars(get_publication_show_url($publication['uid'], $settings['archivedPublicationPid'])) ?>" class="publication__link">
            <?= htmlspecialchars($publication['title']) ?>
            <svg aria-hidden="true" focusable="false" class="icon publication__icon">
                <use xlink:href="#arrow-forward"></use>
            </svg>
        </a>
    <?php endif; ?>
</h2>


<?php 
$has_actions = false;

if ($showPublicationLinks) {
    if ($publication['pdf'] || $publication['htmlUrl'] || $publication['supplementUrl'] || $publication['contactEmail']) {
        $has_actions = true;
    }
} else {
    if ($publication['htmlUrl'] || $publication['supplementUrl'] || $publication['contactEmail']) {
        $has_actions = true;
    }
}
?>


<?php if ($has_actions): ?>

    <nav class="publication-actions">
        <ul class="publication-actions__menu">
            
            <?php if ($showPublicationLinks && $publication['pdf']): ?>
                <li class="publication-actions__menu-item">
                    <a class="publication-actions__link"
                       href="<?= htmlspecialchars($publication['pdf']) ?>"
                       target="_blank"
                       rel="noopener"
                       title="Download PDF">
                        <svg class="icon publication-actions__icon" aria-hidden="true" focusable="false">
                            <use xlink:href="#download"></use>
                        </svg>
                        <span class="screen-reader-text">Download PDF</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($showPublicationLinks && $publication['htmlUrl']): ?>
                <li class="publication-actions__menu-item">
                    <a class="publication-actions__link"
                       href="<?= htmlspecialchars($publication['htmlUrl']) ?>"
                       target="_blank"
                       rel="noopener"
                       title="View online">
                        <svg class="icon publication-actions__icon" aria-hidden="true" focusable="false">
                            <use xlink:href="#external-link"></use>
                        </svg>
                        <span class="screen-reader-text">View online</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($publication['contactEmail']): ?>
                <li class="publication-actions__menu-item">
                    <a class="publication-actions__link"
                       href="<?= htmlspecialchars(get_email_link($publication['contactEmail'])) ?>"
                       target="_blank"
                       rel="noopener"
                       title="E-mail contact">
                        <svg class="icon publication-actions__icon" aria-hidden="true" focusable="false">
                            <use xlink:href="#email"></use>
                        </svg>
                        <span class="screen-reader-text">E-Mail</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($publication['supplementUrl']): ?>
                <li class="publication-actions__menu-item">
                    <a class="publication-actions__link"
                       href="<?= htmlspecialchars($publication['supplementUrl']) ?>"
                       target="_blank"
                       rel="noopener"
                       title="Supplementary material">
                        <svg class="icon publication-actions__icon" aria-hidden="true" focusable="false">
                            <use xlink:href="#attachment"></use>
                        </svg>
                        <span class="screen-reader-text">Supplementary material</span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
<?php endif; ?>
