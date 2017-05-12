	
	<script src='<?= base_url('assets/js/pdfmake/build/pdfmake.min.js') ?>'></script>
	<script src='<?= base_url('assets/js/pdfmake/build/vfs_fonts.js')?>'></script>	
	<script type="text/javascript">
		var dd = {
			content: [
				{ text: 'Tables', style: 'header' },
				'Official documentation is in progress, this document is just a glimpse of what is possible with pdfmake and its layout engine.',
				{ text: 'A simple table (no headers, no width specified, no spans, no styling)', style: 'subheader' },
				'The following table has nothing more than a body array',
				{
					bold: true,
					ul: [
						'auto',
						'star',
						'fixed value'
					]
				},
				{
					style: 'tableExample',
					table: {
						widths: [100, '*', 200, '*'],
						body: [
							[ 'width=100', 'star-sized', 'width=200', 'star-sized'],
							[ 'fixed-width cells have exactly the specified width', { text: 'nothing interesting here', italics: true, color: 'gray' }, { text: 'nothing interesting here', italics: true, color: 'gray' }, { text: 'nothing interesting here', italics: true, color: 'gray' }]
						]
					}
				},
				{ text: 'Headers', style: 'subheader' },
				'You can declare how many rows should be treated as a header. Headers are automatically repeated on the following pages',
				{ text: [ 'It is also possible to set keepWithHeaderRows to make sure there will be no page-break between the header and these rows. Take a look at the document-definition and play with it. If you set it to one, the following table will automatically start on the next page, since there\'s not enough space for the first row to be rendered here' ], color: 'gray', italics: true },
				{
					style: 'tableExample',
					table: {
						headerRows: 1,
						// keepWithHeaderRows: 1,
						// dontBreakRows: true,
						body: [
							[{ text: 'Header 1', style: 'tableHeader' }, { text: 'Header 2', style: 'tableHeader' }, { text: 'Header 3', style: 'tableHeader' }],
							[
									'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
									Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
									Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
									Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 

									'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
									minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
									voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
									deserunt mollit anim id est laborum.', 
									
									'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
									Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
									in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
									sunt in culpa qui officia deserunt mollit anim id est laborum.'
							]
						]
					}
				},
				{ text: 'Column/row spans', style: 'subheader' },
				'Each cell-element can set a rowSpan or colSpan',
				{ text: 'but you can provide a custom styler as well', margin: [0, 20, 0, 8] }
			],
			styles: {
				header: {
					fontSize: 18,
					bold: true,
					margin: [0, 0, 0, 10]
				},
				tableExample: {
					margin: [0, 5, 0, 15]
				},
				tableHeader: {
					bold: true,
					fontSize: 13,
					color: 'black'
				}
			},
			defaultStyle: {
				// alignment: 'justify'
			}
			
		}
		pdfMake.createPdf(dd).download();
	</script>
	<div></div>