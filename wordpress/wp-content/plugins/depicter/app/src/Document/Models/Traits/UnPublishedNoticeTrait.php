<?php
namespace Depicter\Document\Models\Traits;

trait UnPublishedNoticeTrait {
	use HasDocumentIdTrait;
	use EntityPropertiesTrait;

	/**
	 * @var int|null
	 */
	protected $showUnpublishedNotice = false;

	/**
	 * Gets document ID
	 *
	 * @return int|null
	 */
	public function showUnpublishedNotice() {
		return $this->showUnpublishedNotice;
	}

	/**
	 * Enables or disables unpublished notice of document
	 *
	 * @param int $showUnpublishedNotice
	 *
	 * @return mixed
	 */
	public function setUnpublishedNotice( $showUnpublishedNotice = false ) {
		$this->showUnpublishedNotice = $showUnpublishedNotice;
		return $this;
	}

	/**
	 * Render unpublished changes notice
	 *
	 * @return string
	 */
	public function getUnpublishedChangesNotice() {
		if( ! $this->showUnpublishedNotice() || ! $this->getDocumentID() ) {
			return '';
		}
		$markup = '';

		if ( $this->getEntityProperty('status') === 'draft' ) {
			$markup = \Depicter::view('admin/notices/slider-draft-notice')->with( 'view_args', [
				'isPublishedBefore' => \Depicter::documentRepository()->isPublishedBefore( $this->getDocumentID() ),
				'editUrl'           => \Depicter::editor()->getEditUrl( $this->getDocumentID() )
			])->toString();
		}

		return $markup;
	}
}
