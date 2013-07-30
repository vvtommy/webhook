<?php
	 
	set_time_limit(90);

	include 'config.php';

	if (!isset($arrConfig) || empty($arrConfig)) {
		error_log("找不到config.php或config为空");
		exit;
	}

	if (!isset($_POST['payload'])) {
		error_log("payload错误");
		exit;
	}

	$objPayload = json_decode($_POST['payload']);

	foreach ($arrConfig as $strSiteName => $arrSiteConfig) {
		
		$arrSiteConfig = array_merge(
			array(
				'repository' => '*',
				'branch' => '*',
				'username' => '*',
				'execute' => array()
			), 
			$arrSiteConfig
		);

		$boolPassesChecks = TRUE;

		if (($arrSiteConfig['repository'] != '*') && ($arrSiteConfig['repository'] != $objPayload->repository->name)) {
			$boolPassesChecks = FALSE;
		}
		
		if (($arrSiteConfig['branch'] != '*') && ('refs/heads/'.$arrSiteConfig['branch'] != $objPayload->ref)) {
			$boolPassesChecks = FALSE;
		}
		
		if (($arrSiteConfig['username'] != '*') && ($arrSiteConfig['username'] != $objPayload->head_commit->committer->username)) {
			$boolPassesChecks = FALSE;
		}

		if ($boolPassesChecks) {
			$arrSiteConfig['execute'] = (array)$arrSiteConfig['execute'];

			foreach ($arrSiteConfig['execute'] as $arrCommand) {
				$arrOutput = array();
				exec($arrCommand, $arrOutput);

				if (isset($boolDebugLogging) && $boolDebugLogging) {
					error_log("UPDATE: (" . $strSiteName . "):\n" . implode("\n", $arrOutput));
				}
			}
		}
	}