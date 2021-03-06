<?php
/*
 * This file is part of WP-Footnotes a plugin for WordPress
 * Copyright (C) 2007-2013 Simon Elvery
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
?>
<?php wp_enqueue_script('wp-footnotes-admin'); ?>
<?php if (!empty($_POST['save_options'])): ?>
<div class="updated"><p><strong>Options saved.</strong></p></div>
<?php elseif (!empty($_POST['reset_options'])): ?>
<div class="updated"><p><strong>Options reset.</strong></p></div>
<?php endif; ?>

<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<h2>WP-Footnotes Options</h2>
	<form method="post">
		<h3 class="title">Identifier</h3>
		<fieldset id="wp-footnotes-identifier-options">
			<table>
				<tr>
					<th class="identifier-link"><label for="pre_identifier">Before</label></th>
					<th colspan="3" class="identifier-link"><label for="inner_pre_identifier">Link</label></th>
					<th class="identifier-link"><label for="post_identifier">After</label></th>
					<th>&nbsp;</th>
				</tr>
				<tr>
					<td><input type="text" id="pre_identifier" name="pre_identifier" size="3" value="<?php echo $this->current_options['pre_identifier']; ?>" /></td>
					<td><input type="text" id="inner_pre_identifier" name="inner_pre_identifier" size="3" value="<?php echo $this->current_options['inner_pre_identifier']; ?>" /></td>
					<td>
						<select name="list_style_type" id="list_style_type">
							<?php foreach ($this->styles as $key => $val): ?>
							<option value="<?php echo $key; ?>" <?php if ($this->current_options['list_style_type'] == $key) echo 'selected="selected"'; ?> ><?php echo $val; ?></option>
							<?php endforeach; ?>
						</select>
					</td>
					<td><input type="text" name="inner_post_identifier" id="inner_post_identifier" size="3" value="<?php echo $this->current_options['inner_post_identifier']; ?>"  /></td>
					<td><input type="text" name="post_identifier" id="post_identifier" size="3" value="<?php echo $this->current_options['post_identifier']; ?>"  /></td>
					<td><input type="checkbox" name="superscript" id="superscript" <?php if($this->current_options['superscript'] == true) echo 'checked'; ?> /> <label for="superscript">Make note identifier superscript? </label></td>
				</tr>
			</table>
			<div id="list_style_symbol_container" <?php if ($this->current_options['list_style_type'] != 'symbol'): ?>style="display:none;"<?php endif; ?>>
				<p>It's not usually a good idea to choose this type unless you never have more than a couple of footnotes per post.</p>
				<table>
					<tr>
						<th><label for="list_style_symbol">Symbol to use for footnotes:</label></th>
						<td><input type="text" id="list_style_symbol" name="list_style_symbol" value="<?php echo $this->current_options['list_style_symbol']; ?>" /></td>
					</tr>
				</table>
			</div>
		</fieldset>
		<h3 class="title">Back-link </h3>
		<fieldset  id="wp-footnotes-backlink-options">
			<p>These options affect how the back-links after each footnote look. A good back-link character is &amp;#8617; (&#8617). If you want to remove the back-links all together, you can effectively do so by making all these settings blank.</p>
			<table>
				<tr>
					<th><label for="pre_backlink">Before</label></th>
					<th><label for="backlink">Link</label></th>
					<th><label for="post_backlink">After</label></th>
				</tr>
				<tr>
					<td><input type="text" id="pre_backlink" name="pre_backlink" size="3" value="<?php echo $this->current_options['pre_backlink']; ?>" /></td>
					<td><input type="text" id="backlink" name="backlink" size="10" value="<?php echo $this->current_options['backlink']; ?>"  /></td>
					<td><input type="text" id="post_backlink" name="post_backlink" size="3" value="<?php echo $this->current_options['post_backlink']; ?>"  /></td>
				</tr>
			</table>
		</fieldset>
		<table class="form-table">
			<tr>
				<th><label for="pre_footnotes">Anything to be displayed <strong>before</strong> the footnotes at the bottom of the post can go here:</label></th>
				<td><textarea rows="3" cols="60" name="pre_footnotes"><?php echo $this->current_options['pre_footnotes']; ?></textarea></td>
			</tr>
			<tr>
				<th><label for="post_footnotes">Anything to be displayed <strong>after</strong> the footnotes at the bottom of the post can go here:</label></th>
				<td><textarea rows="3" cols="60" name="post_footnotes"><?php echo $this->current_options['post_footnotes']; ?></textarea></td>
			</tr>
			<tr>
				<th><label for="style_rules">Some CSS to style the footnotes (or anything else on the page for that matter):</label></th>
				<td><textarea rows="3" cols="60" name="style_rules"><?php echo $this->current_options['style_rules']; ?></textarea></td>
			</tr>
			<tr>
				<th>Do not display footnotes at all when the page being shown is:</th>
				<td>
					<ul class="checkboxes">
						<li><label for="no_display_home"><input type="checkbox" name="no_display_home" id="no_display_home" <?php if($this->current_options['no_display_home'] == true) echo 'checked'; ?> /> the home page</label></li>
						<li><label for="no_display_preview"><input type="checkbox" name="no_display_preview" id="no_display_preview" <?php if($this->current_options['no_display_preview'] == true) echo 'checked'; ?> /> a preview</label></li>
						<li><label for="no_display_search"><input type="checkbox" name="no_display_search" id="no_display_search" <?php if($this->current_options['no_display_search'] == true) echo 'checked'; ?> /> search results</label></li>
						<li><label for="no_display_feed"><input type="checkbox" name="no_display_feed" id="no_display_feed" <?php if($this->current_options['no_display_feed'] == true) echo 'checked'; ?> /> a feed (RSS, Atom, etc)</label></li>
						<li><label for="no_display_archive"><input type="checkbox" name="no_display_archive" id="no_display_archive" <?php if($this->current_options['no_display_archive'] == true) echo 'checked'; ?> /> an archive page of any kind</label></li>
						<li>
							<ul style="list-style-type:none;">
								<li><label for="no_display_category"><input type="checkbox" name="no_display_category" id="no_display_category" <?php if($this->current_options['no_display_category'] == true) echo 'checked'; ?> /> a category archive</label></li>
								<li><label for="no_display_date"><input type="checkbox" name="no_display_date" id="no_display_date" <?php if($this->current_options['no_display_date'] == true) echo 'checked'; ?> /> a date based archive page</label></li>
							</ul>
						</li>
					</ul>
				</td>
			</tr>
			<tr>
				<th><label for="pretty_tooltips">Use pretty tooltips (uses jQuery UI):</label></th>
				<td><input type="checkbox" name="pretty_tooltips" id="pretty_tooltips" <?php if ($this->current_options['pretty_tooltips'] == true): ?> checked="checked"<?php endif; ?> /></td>
			</tr>
			<tr>
				<th><label for="combine_identical_notes">Combine identical notes? </label></th>
				<td><input type="checkbox" name="combine_identical_notes" id="combine_identical_notes" <?php if ($this->current_options['combine_identical_notes'] == true): ?> checked="checked"<?php endif; ?> /></td>
			</tr>
		</table>
		<h3 class="title">Advanced <a class="toggle-section" href="#wp-footnotes-advanced-options"><small>show</small></a></h3>
		<table id="wp-footnotes-advanced-options" style="display: none;" class="form-table">
			<tr>
				<td colspan="2">Changing these settings will change functionality it a way which may stop footnotes from displaying correctly. For footnotes to work as expected after updating these settings, you will need to <strong>manually update all existing posts with footnotes</strong>. <strong>Please don't change these settings unless you're sure you know what you're doing.</strong></td>
			</tr>
			<tr>
				<th><label for="priority">Priority: </label></th>
				<td>
					<input size="3" type="text" name="priority" id="priority" value="<?php echo $this->current_options['priority']; ?>" /> (Default: 11)
					<p><small>(This setting controls the order in which the WP-Footnotes plugin executes in relation to other plugins. Modifying this setting may affect the behaviour of other plugins.)</small></p>
				</td>
			</tr>
			<tr>
				<th><label for="footnotes_open">Begin a footnote</label></th>
				<td><input size="3" type="text" name="footnotes_open" id="footnotes_open" value="<?php echo $this->current_options['footnotes_open']; ?>" /></td>
			</tr>
			<tr>
				<th><label for="footnotes_close">End a footnote</label></th>
				<td><input size="3" type="text" name="footnotes_close" id="footnotes_close" value="<?php echo $this->current_options['footnotes_close']; ?>" /></td>
			</tr>
			<tr>
				<th><label for="footnotes_shortcode">Footnote shortcode</label></th>
				<td>[ <input size="8" type="text" name="footnotes_shortcode" id="footnotes_shortcode" value="<?php echo $this->current_options['footnotes_shortcode']; ?>" /> ]</td>
			</tr>
		</table>
		<p class="submit"><input type="submit" name="save_options" value="Save Changes" class="button-primary" /></p>
	</form>
	
	<hr/>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="display:block; float: right;">
		<input type="hidden" name="cmd" value="_s-xclick" />
		<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" />
		<img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1" style="display:block; margin:auto;" />
		<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" />
	</form>
	
	<h3 class="title">Bug Reports &amp; Feature Requests</h3>
	<p>You should report any bugs you find and submit feature requests to <a href="http://plugins.trac.wordpress.org/newticket?component=wp-footnotes&owner=drzax">the WordPress Plugins bug tracker</a> (if you're not already you will need to be <a href="http://wordpress.org/extend/plugins/register.php" title="Sign up to the WordPress Plings Directory">signed up</a> and signed in at wordpress.org/extend/plugins).</p>
	<p>If you have a general enquiry that isn't a bug or feature request, the best place is the <a href="http://wordpress.org/tags/wp-footnotes?forum_id=10" title="General Support">WordPress.org support forums for WP-Footnotes</a>.

	<h3 class="title">Contributing</h3>
	<p>The plugin is primarily maintained on <a href="https://github.com/drzax/WP-Footnotes">GitHub</a> with each new release synced to the WordPress Plugins repository. If you've got the <a href="http://www.youtube.com/watch?feature=player_detailpage&v=ZHDi_AnqwN4#t=3s">skills</a> please contribute, it's as simple as making a <a href="https://help.github.com/articles/using-pull-requests">pull request</a>.</p>
	
	<h3 class="title">Documentation &amp; Support</h3>
	<p>You can view <a href="http://elvery.net/drzax/more-things/wordpress-footnotes-plugin/" title="WP-Footnotes documentation">the documentation</a> at <a href="http://elvery.net/drzax" title="sw'as">the author's website</a>. Support is available via the community <a href="http://wordpress.org/tags/wp-footnotes?forum_id=10" title="General Support">WordPress.org support forums for WP-Footnotes</a>. I do monitor posts there and respond when I can.</p>
	
	<h3 class="title">Licensing &amp; Copyright</h3>
	<p>Copyright &copy; 2007-<?php echo date_format(new DateTime(), 'Y'); ?> <a href="http://elvery.net">Simon Elvery</a></p>
	<p>WP-Footnotes is licensed under the <a href="http://www.gnu.org/licenses/gpl.html">GNU GPL</a>. WP-Footnotes comes with ABSOLUTELY NO WARRANTY. This is free software, and you are welcome to redistribute it under certain conditions. See the <a href="http://www.gnu.org/licenses/gpl.html">license</a> for details.</p>
	
</div>