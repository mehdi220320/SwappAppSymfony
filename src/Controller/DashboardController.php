<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/dashboard')]

class DashboardController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(ChartBuilderInterface $chartBuilder): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels'   => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            'datasets' => [
                [
                    'label'           => 'Monthly Sales (K€)',
                    'backgroundColor' => 'rgb(51, 153, 255)',
                    'borderColor'     => 'rgb(51, 153, 255)',
                    'data'            => [15, 35, 45, 70, 55, 60, 95],
                ],
            ],
        ]);

        return $this->render('/dashboard/index.html.twig', ['chart' => $chart]);
    }

}