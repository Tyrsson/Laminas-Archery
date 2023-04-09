<?php

declare(strict_types=1);

namespace Application\Controller;

use Application\Controller\Trait\AjaxActionTrait;
use Laminas\Filter\FilterChain;
use Laminas\Filter\Word\DashToSeparator;
use Laminas\Filter\UpperCaseWords;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\Mvc\MvcEvent;
use Laminas\View\Model\ViewModel;
use Laminas\View\Model\ModelInterface;

class IndexController extends AbstractActionController
{
    use AjaxActionTrait;

    protected ?string $title;

    public function onDispatch(MvcEvent $e)
    {
        $filterChain = new FilterChain();
        // dash to seperator will make book-now -> book now, then
        // UpperCaseWords will make book now -> Book Now
        $filterChain->attach(new DashToSeparator())->attach(new UpperCaseWords());
        $action = $this->params('action');
        if ($action === 'index') {
            $action = 'home';
        }
        $this->title = $filterChain->filter($action);
        $this->layout()->setVariable('action', $this->params('action'));
        parent::onDispatch($e);
    }
    public function indexAction()
    {
        $view = new ViewModel(['title' => $this->title]);
        $this->ajaxAction($view);
        return $view;
    }

    public function rangeAction(): ModelInterface
    {
        $view = new ViewModel(['title' => $this->title]);
        $this->ajaxAction($view);
        return $view;
    }

    public function archeryTagAction(): ModelInterface
    {
        $view = new ViewModel(['title' => $this->title]);
        $this->ajaxAction($view);
        return $view;
    }

    public function pricingAction(): ModelInterface
    {
        $view = new ViewModel(['title' => $this->title]);
        $this->ajaxAction($view);
        return $view;
    }

    public function contactAction(): ModelInterface
    {
        $view = new ViewModel(['title' => $this->title]);
        $this->ajaxAction($view);
        return $view;
    }

    public function bookNowAction(): ModelInterface
    {
        $view = new ViewModel(['title' => $this->title]);
        $this->ajaxAction($view);
        return $view;
    }
}
