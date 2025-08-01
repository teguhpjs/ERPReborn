<?php
namespace Aws\IoTSiteWise;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT SiteWise** service.
 * @method \Aws\Result associateAssets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateAssetsAsync(array $args = [])
 * @method \Aws\Result associateTimeSeriesToAssetProperty(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateTimeSeriesToAssetPropertyAsync(array $args = [])
 * @method \Aws\Result batchAssociateProjectAssets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchAssociateProjectAssetsAsync(array $args = [])
 * @method \Aws\Result batchDisassociateProjectAssets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDisassociateProjectAssetsAsync(array $args = [])
 * @method \Aws\Result batchGetAssetPropertyAggregates(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAssetPropertyAggregatesAsync(array $args = [])
 * @method \Aws\Result batchGetAssetPropertyValue(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAssetPropertyValueAsync(array $args = [])
 * @method \Aws\Result batchGetAssetPropertyValueHistory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchGetAssetPropertyValueHistoryAsync(array $args = [])
 * @method \Aws\Result batchPutAssetPropertyValue(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchPutAssetPropertyValueAsync(array $args = [])
 * @method \Aws\Result createAccessPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccessPolicyAsync(array $args = [])
 * @method \Aws\Result createAsset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetAsync(array $args = [])
 * @method \Aws\Result createAssetModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetModelAsync(array $args = [])
 * @method \Aws\Result createAssetModelCompositeModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAssetModelCompositeModelAsync(array $args = [])
 * @method \Aws\Result createBulkImportJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createBulkImportJobAsync(array $args = [])
 * @method \Aws\Result createComputationModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createComputationModelAsync(array $args = [])
 * @method \Aws\Result createDashboard(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDashboardAsync(array $args = [])
 * @method \Aws\Result createDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createDatasetAsync(array $args = [])
 * @method \Aws\Result createGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createGatewayAsync(array $args = [])
 * @method \Aws\Result createPortal(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPortalAsync(array $args = [])
 * @method \Aws\Result createProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @method \Aws\Result deleteAccessPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccessPolicyAsync(array $args = [])
 * @method \Aws\Result deleteAsset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetAsync(array $args = [])
 * @method \Aws\Result deleteAssetModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetModelAsync(array $args = [])
 * @method \Aws\Result deleteAssetModelCompositeModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAssetModelCompositeModelAsync(array $args = [])
 * @method \Aws\Result deleteComputationModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteComputationModelAsync(array $args = [])
 * @method \Aws\Result deleteDashboard(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDashboardAsync(array $args = [])
 * @method \Aws\Result deleteDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @method \Aws\Result deleteGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteGatewayAsync(array $args = [])
 * @method \Aws\Result deletePortal(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePortalAsync(array $args = [])
 * @method \Aws\Result deleteProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @method \Aws\Result deleteTimeSeries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteTimeSeriesAsync(array $args = [])
 * @method \Aws\Result describeAccessPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAccessPolicyAsync(array $args = [])
 * @method \Aws\Result describeAction(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeActionAsync(array $args = [])
 * @method \Aws\Result describeAsset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetAsync(array $args = [])
 * @method \Aws\Result describeAssetCompositeModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetCompositeModelAsync(array $args = [])
 * @method \Aws\Result describeAssetModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetModelAsync(array $args = [])
 * @method \Aws\Result describeAssetModelCompositeModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetModelCompositeModelAsync(array $args = [])
 * @method \Aws\Result describeAssetProperty(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAssetPropertyAsync(array $args = [])
 * @method \Aws\Result describeBulkImportJob(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeBulkImportJobAsync(array $args = [])
 * @method \Aws\Result describeComputationModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComputationModelAsync(array $args = [])
 * @method \Aws\Result describeComputationModelExecutionSummary(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeComputationModelExecutionSummaryAsync(array $args = [])
 * @method \Aws\Result describeDashboard(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDashboardAsync(array $args = [])
 * @method \Aws\Result describeDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @method \Aws\Result describeDefaultEncryptionConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeDefaultEncryptionConfigurationAsync(array $args = [])
 * @method \Aws\Result describeExecution(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeExecutionAsync(array $args = [])
 * @method \Aws\Result describeGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayAsync(array $args = [])
 * @method \Aws\Result describeGatewayCapabilityConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeGatewayCapabilityConfigurationAsync(array $args = [])
 * @method \Aws\Result describeLoggingOptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeLoggingOptionsAsync(array $args = [])
 * @method \Aws\Result describePortal(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describePortalAsync(array $args = [])
 * @method \Aws\Result describeProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeProjectAsync(array $args = [])
 * @method \Aws\Result describeStorageConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeStorageConfigurationAsync(array $args = [])
 * @method \Aws\Result describeTimeSeries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeTimeSeriesAsync(array $args = [])
 * @method \Aws\Result disassociateAssets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateAssetsAsync(array $args = [])
 * @method \Aws\Result disassociateTimeSeriesFromAssetProperty(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateTimeSeriesFromAssetPropertyAsync(array $args = [])
 * @method \Aws\Result executeAction(array $args = [])
 * @method \GuzzleHttp\Promise\Promise executeActionAsync(array $args = [])
 * @method \Aws\Result executeQuery(array $args = [])
 * @method \GuzzleHttp\Promise\Promise executeQueryAsync(array $args = [])
 * @method \Aws\Result getAssetPropertyAggregates(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetPropertyAggregatesAsync(array $args = [])
 * @method \Aws\Result getAssetPropertyValue(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetPropertyValueAsync(array $args = [])
 * @method \Aws\Result getAssetPropertyValueHistory(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAssetPropertyValueHistoryAsync(array $args = [])
 * @method \Aws\Result getInterpolatedAssetPropertyValues(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getInterpolatedAssetPropertyValuesAsync(array $args = [])
 * @method \Aws\Result invokeAssistant(array $args = [])
 * @method \GuzzleHttp\Promise\Promise invokeAssistantAsync(array $args = [])
 * @method \Aws\Result listAccessPolicies(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccessPoliciesAsync(array $args = [])
 * @method \Aws\Result listActions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listActionsAsync(array $args = [])
 * @method \Aws\Result listAssetModelCompositeModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetModelCompositeModelsAsync(array $args = [])
 * @method \Aws\Result listAssetModelProperties(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetModelPropertiesAsync(array $args = [])
 * @method \Aws\Result listAssetModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetModelsAsync(array $args = [])
 * @method \Aws\Result listAssetProperties(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetPropertiesAsync(array $args = [])
 * @method \Aws\Result listAssetRelationships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetRelationshipsAsync(array $args = [])
 * @method \Aws\Result listAssets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssetsAsync(array $args = [])
 * @method \Aws\Result listAssociatedAssets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAssociatedAssetsAsync(array $args = [])
 * @method \Aws\Result listBulkImportJobs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listBulkImportJobsAsync(array $args = [])
 * @method \Aws\Result listCompositionRelationships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listCompositionRelationshipsAsync(array $args = [])
 * @method \Aws\Result listComputationModelDataBindingUsages(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputationModelDataBindingUsagesAsync(array $args = [])
 * @method \Aws\Result listComputationModelResolveToResources(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputationModelResolveToResourcesAsync(array $args = [])
 * @method \Aws\Result listComputationModels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listComputationModelsAsync(array $args = [])
 * @method \Aws\Result listDashboards(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @method \Aws\Result listDatasets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @method \Aws\Result listExecutions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @method \Aws\Result listGateways(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listGatewaysAsync(array $args = [])
 * @method \Aws\Result listPortals(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPortalsAsync(array $args = [])
 * @method \Aws\Result listProjectAssets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectAssetsAsync(array $args = [])
 * @method \Aws\Result listProjects(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listTimeSeries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTimeSeriesAsync(array $args = [])
 * @method \Aws\Result putDefaultEncryptionConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putDefaultEncryptionConfigurationAsync(array $args = [])
 * @method \Aws\Result putLoggingOptions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putLoggingOptionsAsync(array $args = [])
 * @method \Aws\Result putStorageConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putStorageConfigurationAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateAccessPolicy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccessPolicyAsync(array $args = [])
 * @method \Aws\Result updateAsset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetAsync(array $args = [])
 * @method \Aws\Result updateAssetModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetModelAsync(array $args = [])
 * @method \Aws\Result updateAssetModelCompositeModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetModelCompositeModelAsync(array $args = [])
 * @method \Aws\Result updateAssetProperty(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAssetPropertyAsync(array $args = [])
 * @method \Aws\Result updateComputationModel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateComputationModelAsync(array $args = [])
 * @method \Aws\Result updateDashboard(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDashboardAsync(array $args = [])
 * @method \Aws\Result updateDataset(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateDatasetAsync(array $args = [])
 * @method \Aws\Result updateGateway(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayAsync(array $args = [])
 * @method \Aws\Result updateGatewayCapabilityConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGatewayCapabilityConfigurationAsync(array $args = [])
 * @method \Aws\Result updatePortal(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePortalAsync(array $args = [])
 * @method \Aws\Result updateProject(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 */
class IoTSiteWiseClient extends AwsClient {}
