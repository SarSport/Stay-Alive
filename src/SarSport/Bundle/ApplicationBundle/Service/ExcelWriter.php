<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Service;

use PHPExcel_IOFactory;
use PHPExcel;
use PHPExcel_Cell_DataType;
use Spreadsheet_Excel_Writer_Worksheet;
use PHPExcel_Writer_IWriter;
use SarSport\Bundle\ApplicationBundle\Twig\ApplicationExtension;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ExcelWriter
{
    /**
     * @var PHPExcel_Writer_IWriter
     */
    private $writer;

    /**
     * @var Spreadsheet_Excel_Writer_Worksheet
     */
    private $worksheet;

    /**
     * @var \PHPExcel
     */
    private $phpExcel;

    private $filename = 'application.xls';

    /**
     * @var ApplicationExtension
     */
    private $helper;

    private $translator;

    public function __construct($helper, $translator)
    {
        $this->helper = $helper;
        $this->translator = $translator;
        $this->phpExcel = new PHPExcel();
        $this->phpExcel->setActiveSheetIndex(0);
        $this->worksheet = $this->phpExcel->getActiveSheet();
        $this->writeHead();
    }

    /**
     * Write title of the excel file
     *
     * @param string $title
     */
    public function writeTitle($title)
    {
        if (mb_strlen($title) >31) {
            $title = mb_substr($title, 0, 31);
        }
        $this->worksheet->setTitle($title);
    }

    /**
     * @param \SarSport\Bundle\ApplicationBundle\Entity\Application[] $applications
     * @return bool
     */
    public function writeBody($applications)
    {
        if (!count($applications)) {
            return true;
        }

        $i = 2;
        foreach ($applications as $application) {
            $this->worksheet->getRowDimension($i)->setRowHeight(18);
            $this->worksheet->setCellValueByColumnAndRow(0, $i, $i-1);
            $this->worksheet->setCellValueByColumnAndRow(1, $i, $application->getTeamName());
            $this->worksheet->setCellValueExplicitByColumnAndRow(2, $i, $this->translator->trans($this->helper->getClassName($application->getClass()), array(), 'SarSportApplicationBundle'));
            $this->worksheet->setCellValueByColumnAndRow(3, $i, $this->translator->trans($this->helper->getGroupName($application->getGroup()), array(), 'SarSportApplicationBundle'));
            $this->worksheet->setCellValueByColumnAndRow(4, $i, $this->strToUpper($application->getFirstPlayerLastName()));
            $this->worksheet->setCellValueByColumnAndRow(5, $i, $this->strToUpper($application->getFirstPlayerFirstName()));
            $this->worksheet->setCellValueByColumnAndRow(6, $i, $application->getFirstPlayerBirthday());
            $this->worksheet->setCellValueByColumnAndRow(7, $i, $this->strToUpper($application->getSecondPlayerLastName()));
            $this->worksheet->setCellValueByColumnAndRow(8, $i, $this->strToUpper($application->getSecondPlayerFirstName()));
            $this->worksheet->setCellValueByColumnAndRow(9, $i, $application->getSecondPlayerBirthday());
            $this->worksheet->setCellValueByColumnAndRow(10, $i, $application->getPhonenumber());
            $this->worksheet->setCellValueByColumnAndRow(11, $i, $this->translator->trans($this->helper->getBoolean($application->getAdditionalMaps()), array(), 'SarSportApplicationBundle'));
            if ($application->getFirstPlayerTShirt() && $application->getFirstPlayerTShirtSize()) {
                $fPlayer = ' / ' . $application->getFirstPlayerTShirtSize();
            } else {
                $fPlayer = '';
            }
            if ($application->getSecondPlayerTShirt() && $application->getSecondPlayerTShirtSize()) {
                $sPlayer = ' / ' . $application->getSecondPlayerTShirtSize();
            } else {
                $sPlayer = '';
            }
            $this->worksheet->setCellValueByColumnAndRow(12, $i, $this->translator->trans($this->helper->getBoolean($application->getFirstPlayerTShirt()), array(), 'SarSportApplicationBundle') . $fPlayer);
            $this->worksheet->setCellValueByColumnAndRow(13, $i, $this->translator->trans($this->helper->getBoolean($application->getSecondPlayerTShirt()), array(), 'SarSportApplicationBundle') . $sPlayer);
            $this->worksheet->setCellValueByColumnAndRow(14, $i, $this->translator->trans($this->helper->getBoolean($application->getStatus()), array(), 'SarSportApplicationBundle'));
            $this->worksheet->setCellValueByColumnAndRow(15, $i, $application->getPaymentValue());
            $this->worksheet->setCellValueByColumnAndRow(16, $i, $application->getPaymentDescription());
            $i++;
        }
    }

    public function close()
    {
        $this->writer = PHPExcel_IOFactory::createWriter($this->phpExcel, 'Excel5');
        $this->writer->save('php://output');
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Filling first row(head row)
     */
    private function writeHead()
    {
        $this->worksheet->getRowDimension(1)->setRowHeight(18);
        $this->worksheet->setCellValueByColumnAndRow(0, 1, '№');
        $this->worksheet->getColumnDimensionByColumn(0)->setWidth(3);
        $this->worksheet->setCellValueByColumnAndRow(1, 1, 'Команда');
        $this->worksheet->getColumnDimensionByColumn(1)->setWidth(20);
        $this->worksheet->setCellValueByColumnAndRow(2, 1, 'Класс');
        $this->worksheet->getColumnDimensionByColumn(2)->setWidth(8);
        $this->worksheet->setCellValueByColumnAndRow(3, 1, 'Группа');
        $this->worksheet->getColumnDimensionByColumn(3)->setWidth(9);
        $this->worksheet->setCellValueByColumnAndRow(4, 1, 'Фамилия');
        $this->worksheet->getColumnDimensionByColumn(4)->setWidth(16);
        $this->worksheet->setCellValueByColumnAndRow(5, 1, 'Имя');
        $this->worksheet->getColumnDimensionByColumn(5)->setWidth(16);
        $this->worksheet->setCellValueByColumnAndRow(6, 1, 'Г.р.');
        $this->worksheet->getColumnDimensionByColumn(6)->setWidth(6);
        $this->worksheet->setCellValueByColumnAndRow(7, 1, 'Фамилия');
        $this->worksheet->getColumnDimensionByColumn(7)->setWidth(16);
        $this->worksheet->setCellValueByColumnAndRow(8, 1, 'Имя');
        $this->worksheet->getColumnDimensionByColumn(8)->setWidth(16);
        $this->worksheet->setCellValueByColumnAndRow(9, 1, 'Г.р.');
        $this->worksheet->getColumnDimensionByColumn(9)->setWidth(6);
        $this->worksheet->setCellValueByColumnAndRow(10, 1, 'Телефон');
        $this->worksheet->getColumnDimensionByColumn(10)->setWidth(14);
        $this->worksheet->setCellValueByColumnAndRow(11, 1, 'Доп. к/к');
        $this->worksheet->getColumnDimensionByColumn(11)->setWidth(6);
        $this->worksheet->setCellValueByColumnAndRow(12, 1, 'Фут.1');
        $this->worksheet->getColumnDimensionByColumn(12)->setWidth(16);
        $this->worksheet->setCellValueByColumnAndRow(13, 1, 'Фут.2');
        $this->worksheet->getColumnDimensionByColumn(13)->setWidth(16);
        $this->worksheet->setCellValueByColumnAndRow(14, 1, 'Оплата');
        $this->worksheet->getColumnDimensionByColumn(14)->setWidth(6);
        $this->worksheet->setCellValueByColumnAndRow(15, 1, 'Сумма');
        $this->worksheet->getColumnDimensionByColumn(15)->setWidth(6);
        $this->worksheet->setCellValueByColumnAndRow(16, 1, 'Описание');
        $this->worksheet->getColumnDimensionByColumn(16)->setWidth(50);
    }

    /**
     * @param $string
     * @return string
     */
    private function strToUpper($string)
    {
        return mb_strtoupper($string, 'UTF-8');
    }
}
