<?php

class CommentFilterAntispamguardConfig extends ModuleConfig {
  public function getDefaults() {
    return array(
                  'require_email_author' => '',
                  'honeypot' => '',
                  'already_commented' => '1',
                  'gravatar_check' => '',
                  'bbcode_check' => 'chacked',
                  'advanced_check' => '1',
                  'regexp_check' => '',
                  'spam_ip_local' => '',
                  'dnspl_check' => '',
                  'approve_comment' => ''
          );

  }
  public function getInputfields() {
    $inputfields = parent::getInputfields();

		$f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'require_email_author');
		$f->label = __('Require E-Mail');
		$f->description = __('Require the E-Mail from commenters.');
		$inputfields->add($f);

		$f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'honeypot');
		$f->label = __('Activate Honeypot');
		$f->description = __('Add a hidden Field to your Commentform to protect from Spambot.');
		$inputfields->add($f);

		$f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'already_commented');
		$f->label = __('Trust approved commenters');
		$f->description = __('Always approve previously approved users.');
		$inputfields->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'gravatar_check');
		$f->label = __('Trust Gravatar');
		$f->description = __('Automatically approve Comments from Authors with Gravatar. (Pleas note the Privacy hint)');
		$inputfields->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'bbcode_check');
		$f->label = __('BBcode as Spam.');
		$f->description = __('Review the comment contents for BBCode links.');
		$inputfields->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'advanced_check');
		$f->label = __('Validate commenters IP');
		$f->description = __('Validity check for used ip address.');
		$inputfields->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'regexp_check');
		$f->label = __('Use regular expressions');
		$f->description = __('Predefined and custom patterns by plugin hook (not now!).');
		$inputfields->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'spam_ip_local');
		$f->label = __('Look in the local spam database');
		$f->description = __('Already marked as spam? Yes? No?.');
		$inputfields->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'dnspl_check');
		$f->label = __('Use public Spam database');
		$f->description = __('Use the public Spam database from https://stopforumspam.com to check for knowen Spamer IP\'s.');
		$inputfields->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'approve_comment');
		$f->label = __('Auto Approve');
		$f->description = __('Automatically approve all comments without spam.');
		$inputfields->add($f);

		return $inputfields;
  }
}
