<?php
namespace de\RaumZeitLabor\PartKeepr\Footprint;
use de\RaumZeitLabor\PartKeepr\Util\Serializable;

declare(encoding = 'UTF-8');

use de\RaumZeitLabor\PartKeepr\UploadedFile\UploadedFile;

/**
 * Holds a footprint attachment
 * @Entity
 **/
class FootprintAttachment extends UploadedFile implements Serializable {
	/**
	 * The description of this attachment
	 * @Column(type="text")
	 * @var string
	 */
	private $description;
	
	/**
	 * Creates a new footprint attachment
	 */
	public function __construct () {
		parent::__construct();
		$this->setType("FootprintAttachment");
	}
	/**
	 * The footprint object
	 * @ManyToOne(targetEntity="de\RaumZeitLabor\PartKeepr\Footprint\Footprint")
	 * @var Footprint
	 */
	private $footprint = null;

	/**
	 * Sets the footprint
	 * @param Footprint $footprint The footprint to set
	 */
	public function setFootprint (Footprint $footprint) {
		$this->footprint = $footprint;
	}

	/**
	 * Returns the footprint
	 * @return Footprint the footprint
	 */
	public function getFootprint () {
		return $this->footprint;
	}
	
	/**
	 * Sets the description for this attachment
	 * @param string $description The attachment description
	 */
	public function setDescription ($description) {
		$this->description = $description;
	}
	
	/**
	 * Returns the description for this attachment
	 * @return string The description
	 */
	public function getDescription () {
		return $this->description;
	}

	/**
	 *
	 * Serializes this footprint attachment
	 * @return array The serialized footprint  attachment
	 */
	public function serialize () {
		return array(
			"id" => $this->getId(),
			"footprint_id" => $this->getFootprint()->getId(),
			"originalFilename" => $this->getOriginalFilename(),
			"mimetype" => $this->getMimetype(),
			"extension" => $this->getExtension(),
			"size" => $this->getSize(),
			"description" => $this->getDescription());
	}
}