<?php

/**
 * (c) FSi sp. z o.o <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FSi\Bundle\TerytDatabaseBundle\Command;

use Doctrine\Common\Persistence\ObjectManager;
use FSi\Bundle\TerytDatabaseBundle\Teryt\Import\StreetsNodeConverter;
use Symfony\Component\Console\Input\InputArgument;

class TerytImportStreetsCommand extends TerytImportCommand
{
    protected function configure()
    {
        $this->setName('teryt:import:streets')
            ->setDescription('Import streets data from xml to database')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'Places streets xml file'
            );
    }

    /**
     * @param \SimpleXMLElement $node
     * @param \Doctrine\Common\Persistence\ObjectManager $om
     * @return \FSi\Bundle\TerytDatabaseBundle\Teryt\Import\NodeConverter
     */
    public function getNodeConverter(\SimpleXMLElement $node, ObjectManager $om)
    {
        return new StreetsNodeConverter($node, $om);
    }

    /**
     * @return string
     */
    protected function getRecordXPath()
    {
        return '/ulic/catalog/row';
    }
}
