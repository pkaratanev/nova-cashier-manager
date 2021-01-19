<?php

namespace PKaratanev\CashierTool;

use Laravel\Nova\Nova;
use Laravel\Nova\ResourceTool;
use Laravel\Nova\Tool;

class CashierResourceTool extends ResourceTool
{
    /**
     * Get the displayable name of the resource tool.
     *
     * @return string
     */
    public function name()
    {
        return 'Manage Subscription';
    }

    /**
     * Get the component name for the resource tool.
     *
     * @return string
     */
    public function component()
    {
        return 'cashier-tool';
    }
}
