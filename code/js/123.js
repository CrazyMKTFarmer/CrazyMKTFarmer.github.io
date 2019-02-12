			var body = document.getElementsByTagName('body')[0];
			var removeLoading = function() {
				// In a production application you would remove the loading class when your
				// application is initialized and ready to go.  Here we just artificially wait
				// 3 seconds before removing the class.
				setTimeout(function() {
					body.className = body.className.replace(/loading/, '');
				}, 1500);
			};
			removeLoading();