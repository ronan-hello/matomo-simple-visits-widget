<?php

namespace Piwik\Plugins\KPIWidgets\Widgets;

use Piwik\Metrics\Formatter;
use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;

class KPIWidgetsUniqueOutlinks extends Widget
{

    /**
     * Configure the widget
     *
     * @param WidgetConfig $config
     */
    public static function configure(WidgetConfig $config)
    {
        $config->setCategoryId('KPI Widgets');

        $config->setName('KPIWidgets_UniqueOutlinks');
    }


    /**
     * Render the widget
     *
     * @return string
     */
    public function render()
    {
        $result = json_decode(\Piwik\API\Request::processRequest('API.get', ['format' => 'json']));

        $formatter = new Formatter();
        $value = $formatter->getPrettyNumber($result->nb_uniq_outlinks);

        return $this->renderTemplate('widget', ['value' => $value]);
    }

}