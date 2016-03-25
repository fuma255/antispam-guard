<?php

class CommentFilterAntispamguardConfig extends ModuleConfig {
  public function getDefaults() {
    return array(
                  'require_email_author' => '',
                  'honeypot' => '',
                  'already_commented' => 'checked',
                  'gravatar_check' => '',
                  'bbcode_check' => 'checked',
                  'advanced_check' => 'checked',
                  'regexp_check' => '',
                  'spam_ip_local' => '',
                  'dnspl_check' => '',
                  'approve_comment' => ''
          );

  }
  public function getInputfields() {
    $inputfields = parent::getInputfields();

		$name = "require_email_author";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Require E-Mail');
		$f->description = __('Require the E-Mail from commenters.');
		$inputfields->add($f);

		$name = "honeypot";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Activate Honeypot');
		$f->description = __('Add a hidden Field to your Commentform to protect from Spambot.');
		$inputfields->add($f);

		$name = "already_commented";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Trust approved commenters');
		$f->description = __('Always approve previously approved users.');
		$inputfields->add($f);

		$name = "gravatar_check";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Trust Gravatar');
		$f->description = __('Automatically approve Comments from Authors with Gravatar. (Pleas note the Privacy hint)');
		$inputfields->add($f);

		$name = "bbcode_check";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('BBcode as Spam.');
		$f->description = __('Review the comment contents for BBCode links.');
		$inputfields->add($f);

		$name = "advanced_check";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Validate commenters IP');
		$f->description = __('Validity check for used ip address.');
		$inputfields->add($f);

		$name = "regexp_check";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Use regular expressions');
		$f->description = __('Predefined and custom patterns by plugin hook (not now!).');
		$inputfields->add($f);

		$name = "spam_ip_local";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Look in the local spam database');
		$f->description = __('Already marked as spam? Yes? No?.');
		$inputfields->add($f);

		$name = "dnspl_check";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Use public Spam database');
		$f->description = __('Use the public Spam database from https://stopforumspam.com to check for knowen Spamer IP\'s.');
		$inputfields->add($f);

		$name = "approve_comment";
		if(!isset($data[$name])) $data[$name] = '';
		$f = Wire::getFuel('modules')->get('InputfieldCheckbox');
		$f->attr('name', $name);
		$f->label = __('Auto Approve');
		$f->description = __('Automatically approve all comments without spam.');
		$inputfields->add($f);

		return $inputfields;
  }
}
