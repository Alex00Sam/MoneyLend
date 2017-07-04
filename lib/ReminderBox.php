<?php
class ReminderBox extends \atk4\ui\View {
    public $ui='piled segment';
    /**
     * Specify which contact to remind about
     */
    public function setModel(\atk4\data\Model $friend) {
        $this->add('Header')->set('Please repay my loan, '.$friend['name']);
        $this->add('Text')->addParagraph('I have loaned you a total of (sum) from which you still owe me (sum-returned). Please pay back!');
        $this->add('Text')->addParagraph('Thanks!');
    }
}
