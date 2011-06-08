<?php
/**
 * @package modx
 * @subpackage manager.controllers.system
 */
class SystemEventManagerController extends modManagerController {
    /**
     * Check for any permissions or requirements to load page
     * @return bool
     */
    public function checkPermissions() {
        return $this->modx->hasPermission('error_log_view');
    }

    /**
     * Register custom CSS/JS for the page
     * @return void
     */
    public function loadCustomCssJs() {
        $mgrUrl = $this->modx->getOption('manager_url',null,MODX_MANAGER_URL);
        $this->modx->regClientStartupScript($mgrUrl.'assets/modext/widgets/system/modx.panel.error.log.js');
        $this->modx->regClientStartupScript($mgrUrl.'assets/modext/sections/system/event.js');
        $this->modx->regClientStartupHTMLBlock('<script type="text/javascript">
        MODx.hasEraseErrorLog = "'.($this->modx->hasPermission('error_log_erase') ? 1 : 0).'"
        </script>');
    }

    /**
     * Custom logic code here for setting placeholders, etc
     * @param array $scriptProperties
     * @return mixed
     */
    public function process(array $scriptProperties = array()) {}

    /**
     * Return the pagetitle
     *
     * @return string
     */
    public function getPageTitle() {
        return $this->modx->lexicon('error_log');
    }

    /**
     * Return the location of the template file
     * @return string
     */
    public function getTemplateFile() {
        return 'system/event/list.tpl';
    }

    /**
     * Specify the language topics to load
     * @return array
     */
    public function getLanguageTopics() {
        return array('system_events');
    }
}