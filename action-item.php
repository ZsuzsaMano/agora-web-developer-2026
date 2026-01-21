<!-- Prevents warnings if someone includes it without setting all “props”. -->
<?php if (!isset($url, $icon, $title, $label)) return; ?>

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