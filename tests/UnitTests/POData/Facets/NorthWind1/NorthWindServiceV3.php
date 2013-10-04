<?php

namespace UnitTests\POData\Facets\NorthWind1;


use POData\Configuration\EntitySetRights;
use POData\IService;
use POData\IRequestHandler;
use POData\Configuration\ServiceProtocolVersion;
use POData\Configuration\IServiceConfiguration;
use POData\BaseService;

use UnitTests\POData\Facets\NorthWind1\NorthWindQueryProvider;
use UnitTests\POData\Facets\BaseServiceTestWrapper;

class NorthWindServiceV3 extends BaseServiceTestWrapper
{

    /**
     * This method is called only once to initialize service-wide policies
     * 
     * @param IServiceConfiguration $config
     */
    public function initialize(IServiceConfiguration $config)
    {
        $config->setEntitySetPageSize('*', 5);
        $config->setEntitySetAccessRule('*', EntitySetRights::ALL);
        $config->setAcceptCountRequests(true);
        //Disable projection request for testing purpose
        $config->setAcceptProjectionRequests(false);
        $config->setMaxDataServiceVersion(ServiceProtocolVersion::V3);
    }

	/**
	 * @return \POData\Providers\Metadata\IMetadataProvider
	 */
	public function getMetadataProvider()
	{
		return NorthWindMetadata::Create();
	}

	/**
	 * @return \POData\Providers\Query\IQueryProvider
	 */
	public function getQueryProvider()
	{
		return new NorthWindQueryProvider();
	}

	public function getStreamProviderX(){
		throw new Exception("not implemented");
	}
}