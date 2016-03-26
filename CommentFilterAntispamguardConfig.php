<?php

class CommentFilterAntispamguardConfig extends ModuleConfig {
  public function getDefaults() {
    return array(
                  'require_email_author' => '',
                  'honeypot' => '',
                  'already_commented' => 1,
                  'gravatar_check' => '',
                  'bbcode_check' => 1,
                  'advanced_check' => 1,
                  'regexp_check' => 1,
                  'spam_ip_local' => '',
                  'dnspl_check' => '',
                  'approve_comment' => '',
          );

  }
  public function getInputfields() {
    $inputfields = parent::getInputfields();

		$fieldsetBasic = $this->modules->get("InputfieldFieldset");
		$fieldsetBasic->label = "Basic";
		$fieldsetBasic->collapsed = Inputfield::collapsedNo;
		$inputfields->add($fieldsetBasic);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'approve_comment');
		$f->label = __('Auto Approve');
		$f->description = __('Automatically approve all comments without spam.');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetBasic->add($f);

		$f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'require_email_author');
		$f->label = __('Require E-Mail');
		$f->description = __('Require the E-Mail from commenters.');
    $f->autocheck = true;
    $f->columnWidth = 50;
		$fieldsetBasic->add($f);

		$f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'already_commented');
		$f->label = __('Trust approved commenters');
		$f->description = __('Always approve previously approved users.');
    $f->autocheck = true;
    $f->columnWidth = 50;
		$fieldsetBasic->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
    $f->attr('name', 'bbcode_check');
    $f->label = __('BBcode as Spam.');
    $f->description = __('Review the comment contents for BBCode links.');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetBasic->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
    $f->attr('name', 'honeypot');
    $f->label = __('Activate Honeypot');
    $f->description = __('Add a hidden Field to your Commentform to protect from Spambot.');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetBasic->add($f);

    $fieldsetAdvanced = $this->modules->get("InputfieldFieldset");
		$fieldsetAdvanced->label = "Advanced";
		$fieldsetAdvanced->collapsed = Inputfield::collapsedNo;
		$inputfields->add($fieldsetAdvanced);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'advanced_check');
		$f->label = __('Validate commenters IP');
		$f->description = __('Validity check for used ip address.');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetAdvanced->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'spam_ip_local');
		$f->label = __('Look in the local spam database');
		$f->description = __('Already marked as spam? Yes? No?.');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetAdvanced->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
		$f->attr('name', 'regexp_check');
		$f->label = __('Use regular expressions');
		$f->description = __('Predefined and custom patterns by plugin hook (not now!).');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetAdvanced->add($f);

    $fieldsetExternal = $this->modules->get("InputfieldFieldset");
		$fieldsetExternal->label = "External";
    $fieldsetExternal->description = __('Please note the privacy of your Users!');
		$fieldsetExternal->collapsed = Inputfield::collapsedNo;
		$inputfields->add($fieldsetExternal);

    $f = $this->modules->get('InputfieldCheckbox');
    $f->attr('name', 'gravatar_check');
    $f->label = __('Trust Gravatar');
    $f->description = __('Automatically approve Comments from Authors with Gravatar. (Pleas note the Privacy hint)');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetExternal->add($f);

    $f = $this->modules->get('InputfieldCheckbox');
    $f->attr('name', 'dnspl_check');
    $f->label = __('Use public Spam database');
    $f->description = __('Use the public Spam database from https://stopforumspam.com to check for knowen Spamer IP\'s.');
    $f->autocheck = true;
    $f->columnWidth = 50;
    $fieldsetExternal->add($f);

		return $inputfields;
  }
}
